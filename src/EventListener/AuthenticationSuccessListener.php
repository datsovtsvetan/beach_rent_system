<?php


namespace App\EventListener;

use App\Repository\CompanyRepository;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSuccessListener
{
    /**
     * @param AuthenticationSuccessEvent $event
     */
    private $userRepo;
    private $companyRepo;
    // http only code
    private $secure = false;
    private $tokenTtl;
    // end http only code
    /**
     * @var LoggerInterface
     */
    public $logger;

    public function __construct($tokenTtl, UserRepository $userRepo, CompanyRepository $companyRepo, LoggerInterface $logger)
    {
        $this->tokenTtl = $tokenTtl;
        $this->userRepo = $userRepo;
        $this->companyRepo = $companyRepo;

        $this->logger = $logger;
    }

    /**
     * @throws \Exception
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {

        //$this->logger->info("in AuthenticationSuccessListener blaaaa");
        dump('in AuthenticationSuccessListener blaaaa');
        $data = $event->getData();
        $user = $event->getUser();
        if (!$user instanceof UserInterface) {
            //dump('in if statemenet!!!!!')
            return;
        }

        $dbUser = $this->userRepo->findOneBy(["email" => $user->getUserIdentifier()]);
        $companyName = $this->companyRepo->findOneBy(["id" => $dbUser->getCompany()->getId()])->getName();

        //dump($companyName);
        $checkBelongsToCompany = str_contains($user->getUserIdentifier(), $companyName);

//        if (!$checkBelongsToCompany) {
//            return;
//        }
        // HTTP ONLY COOKIE
//        $response = $event->getResponse();
//        $token = $data['token'];
//        unset($data['token']);
//        $response->headers->setCookie(
//            new Cookie('BEARER', $token,
//                (new \DateTime())
//                    ->add(new \DateInterval('PT' . $this->tokenTtl . 'S'))
//            ), '/', null, $this->secure
//        );
        //END HTTP ONLY COOKIE

        // test
        $response = $event->getResponse();
        $response->headers->add(['Access-Control-Allow-Credentials' => true]);
                                  //Access-Control-Allow-Credentials
        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3001']);
        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3000']);
        //$event->setResponse($response);
        // end test

        // $data['token'] contains the JWT
        $data['companyName'] = $companyName;
        $data['userName'] = $dbUser->getUserIdentifier();
        $data['userId'] = $dbUser->getId();
        $data['companyId'] = $dbUser->getCompany()->getId();
        $data['roles'] = $dbUser->getRoles();
        //dump($data);
        $event->setData($data);
    }
}
//namespace App\EventListener;
//
//use App\Repository\CompanyRepository;
//use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
//use Symfony\Component\Security\Core\User\UserInterface;
//
//class AuthenticationSuccessListener
//{
//
//    private $companyRepo;
//
//    public function __construct(CompanyRepository $companyRepo)
//    {
//        $this->companyRepo = $companyRepo;
//    }
//
//    /**
//     * Add public data to the authentication response
//     *
//     * @param AuthenticationSuccessEvent $event
//     */
//    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
//    {
//        $data = $event->getData();
//        $user = $event->getUser();
//        $email = $user->getUserIdentifier();
//        if (!$user instanceof UserInterface) {
//            return;
//        }
//
//        $domainName = strtok(substr(strrchr($email, "@"), 1), '.');
//
//        $companyId = $this->companyRepo->findByName( $domainName );
//
//        // $data['token'] contains the JWT
//        $data['id'] = $user->getUserIdentifier();
//        $data['companyId'] = $companyId;
//        $data['domain'] = $domainName;
//        $event->setData($data);
//    }
//}
