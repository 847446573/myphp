<?php
namespace Src\Service\Observer;
/**
 * Class Event
 * @package Src\Service\Observer
 * 观察者模式
 */
abstract class Event {
    private $observers = [];
    public function addObserver ($observer) {
        $this->observers[] = $observer;
    }
    public function notice () {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}
