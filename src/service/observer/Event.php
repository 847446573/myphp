<?php
namespace Src\Service\Observer;
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
