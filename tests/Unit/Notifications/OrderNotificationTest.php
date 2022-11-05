<?php

namespace Tests\Unit\Notifications;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Mockery;
use Tests\TestCase;

class OrderNotificationTest extends TestCase
{
    protected $notification;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [
            'id' => 1,
            'status' => 3,
        ];
        $this->notification = new OrderNotification($this->data);
    }

    public function tearDown(): void
    {
        unset($this->data);
        unset($this->notification);
        parent::tearDown();
    }

    public function testVia()
    {
        $this->assertEquals(['database'], $this->notification->via(User::class));
    }

    public function testToArray()
    {
        $notifiable = Mockery::mock(Order::class)->makePartial();
        $result = $this->notification->toArray($notifiable);

        $this->assertIsArray($result);
    }
}
