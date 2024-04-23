<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ItemUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Specifying the channels
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('An item has been updated.')
            ->line('Item Name: ' . $this->item->name)
            ->action('View Item', url('/items/' . $this->item->id))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'item_id' => $this->item->id,

            'message' => 'An item has been updated: ' . $this->item->name
        ];
    }
}
