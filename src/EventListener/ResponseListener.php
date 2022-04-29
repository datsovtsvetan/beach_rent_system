<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Psr\Log\LoggerInterface;

class ResponseListener
{
//    public $logger;
//    public function __construct(LoggerInterface $logger){
//        $this->logger = $logger;
//    }
    public function onKernelResponse(ResponseEvent $event)
    {
        dump("in RequestListener ");
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the master request
            return;
        }


        $this->logger->info("in RequestListener blaaaa");
        //dd('in custom request listener that sets headers for CORS');

        $response = $event->getResponse();

        // Set multiple headers simultaneously
        $response->headers->add(['Access-Control-Allow-Credentials' => 'true']);
        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3000']);
        $response->headers->add(['Access-Control-Allow-Origin' => 'http://localhost:3001']);
        $response->headers->add(['Header-Name1' => 'customValue']);

        //$event->setResponse($response);

        // Or set a single header
        //$response->headers->set("Example-Header", "ExampleValue");
    }
}