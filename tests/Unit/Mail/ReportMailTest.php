<?php

namespace Tests\Unit\Mail;

use App\Mail\ReportMail;
use App\Models\Order;
use App\Models\User;
use Mockery;
use Tests\TestCase;

class ReportMailTest extends TestCase
{
    protected $user;
    protected $orders;
    protected $report;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = Mockery::mock(User::class)->makePartial();
        $this->orders = Mockery::mock(Order::class)->makePartial();
        $this->report = new ReportMail(
            $this->user,
            $this->orders,
        );
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testBuild()
    {
        $response = $this->report->build();
        $this->assertInstanceOf(ReportMail::class, $response);
    }
}
