<?php

namespace Tests\Unit\Events;

use App\Events\StatusNotificationEvent;
use App\Models\Order;
use Tests\TestCase;

class StatusNotificationEventTest extends TestCase
{
    protected $data;
    protected $user;

    public function testBroadcastChannel()
    {
        $this->data = [
            'id' => 1,
            'status' => 1,
        ];
        $event = new StatusNotificationEvent($this->data, $this->user);
        $channel = $event->broadcastOn();

        $this->assertEquals('my-channel-', $channel->name);
    }
}
