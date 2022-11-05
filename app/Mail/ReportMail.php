<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        $orders
    ) {
        $this->user = $user;
        $this->orders = $orders;
        $this->queue = 'report';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.report')->with(['user' => $this->user, 'orders' => $this->orders]);
    }
}
