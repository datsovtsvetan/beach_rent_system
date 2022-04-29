<?php


namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ResponseSubscriber implements EventSubscriberInterface
{
    public function onKernelResponse(ResponseEvent $event){
       // dump('in our custom subscriber');
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the master request
            return;
        }


        //$this->logger->info("in RequestListener blaaaa");
        //dd('in custom request listener that sets headers for CORS');

        $response = $event->getResponse();


        // Set multiple headers simultaneously
        $response->headers->add(['Access-Control-Allow-Credentials' => 'true']);
        //$response->headers->add(['Access-Control-Expose-Headers' => 'Set-Cookie, Authorization, Bearer']);
        $response->headers->add(['Access-Control-Expose-Headers' => 'Set-Cookie']);

        $response->headers->add(['Access-Control-Allow-Headers' => 'Authorization, Origin, X-Requested-With, Content-Type, Accept']);
        //$response->headers->add(['Access-Control-Allow-Headers' => 'content-type']);
        $response->headers->add(['Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS']);
       // $response->headers->add(['Access-Control-Allow-Origin' => 'https://localhost:5000']);



//        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3001']);
//        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3000']);
        //dump($response);
    }
    public static function getSubscribedEvents(): array
    {
       return [
           ResponseEvent::class => 'onKernelResponse',
       ];
    }

}