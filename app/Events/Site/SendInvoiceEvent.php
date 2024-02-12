<?php

namespace App\Events\Site;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $email;
    public object $order;
    public string $shippingTime;
    public float $subTotal;
    public float $taxPrice;
    /**
     * Create a new event instance.
     */
    public function __construct(string $email, Order $order, string $shippingTime, float $subTotal, float $taxPrice)
    {
        $this->email = $email;
        $this->order = $order;
        $this->shippingTime = $shippingTime;
        $this->subTotal = $subTotal;
        $this->taxPrice = $taxPrice;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
