<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewBuyerLead extends Notification
{
    use Queueable;

    protected $buyer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->priority(1)
                    ->subject('New Buyer Lead: ' . $this->buyer->name)
                    ->greeting('Meet your next potential client!')
                    ->line($this->buyer->name)
                    ->line($this->buyer->phone)
                    ->line($this->buyer->email)
                    ->action('View your New Buyer', route('agent.leads.show', $this->buyer));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
