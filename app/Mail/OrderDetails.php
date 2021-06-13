<?php

namespace App\Mail;


use App\Models\Client;
use App\Models\Order;
use App\Models\Store;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $store;
    public $user;
    public $firstName;
    public $lastName;
    public $address;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Store $store, User $user, string $firstName, string $lastName, string $address,string $status)
    {
        $this->order = $order;
        $this->store = $store;
        $this->user = $user;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('shop.order_details_mail');
    }
}
