<?php

namespace FlashEvents\Services\Traits;


use FlashEvents\Services\Event;

trait EventManagerTrait
{
    /** @var Event */
    protected $eventManager;

    /**
     * @return Event
     */
    public function getEventManager(): Event
    {
        return $this->eventManager;
    }

    /**
     * @param Event $eventManager
     *
     * @return $this
     */
    public function setEventManager(Event $eventManager)
    {
        $this->eventManager = $eventManager;

        return $this;
    }
}