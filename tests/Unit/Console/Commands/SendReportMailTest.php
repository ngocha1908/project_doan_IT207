<?php

namespace Tests\Unit\Console\Commands;

use App\Console\Commands\SendReportMail;
use App\Models\Order;
use App\Models\User;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Tests\TestCase;

class SendReportMailTest extends TestCase
{
    protected $command;
    protected $userRepo;
    protected $orderRepo;
    protected $users;
    protected $orders;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepo = Mockery::mock(UserRepositoryInterface::class)->makePartial();
        $this->orderRepo = Mockery::mock(OrderRepositoryInterface::class)->makePartial();
        $this->command = new SendReportMail($this->userRepo, $this->orderRepo);
        $this->users = User::factory()->count(10)->make();
    }

    public function tearDown(): void
    {
        unset($this->command);
        parent::tearDown();
    }

    public function testHandle()
    {
        Mail::fake();
        $users = User::factory()->count(10)->make();

        $this->userRepo->shouldReceive('getAdmins')->andReturn($users);
        $this->orderRepo->shouldReceiVe('getSales')->andReturn();

        $response = $this->command->handle($this->orderRepo, $this->userRepo);
        $this->assertTrue($response);
    }
}
