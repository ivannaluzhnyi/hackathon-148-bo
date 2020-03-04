<?php

namespace App\EventSubscriber;
use App\Services\GiveScore as toto;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Agent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class UserInformationScoreSubscriber implements EventSubscriberInterface{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['test', EventPriorities::POST_WRITE],
        ];
    }

    public function test(ViewEvent $event){
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        if (!$user instanceof Agent || Request::METHOD_POST !== $method) {
            return;
        }
        $test = new toto;
        $text =  $test->addScore($user);
        var_dump($text);
        die();
    }
}
