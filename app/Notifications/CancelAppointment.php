<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class CancelAppointment extends Notification
{
    use Queueable;
    use Notifiable;

    /**
     * Create a new notification instance.
     */
    public $appointment;
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Your Appointment Has Been Canceled')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('We regret to inform you that your appointment on ' . Carbon::parse($this->appointment->appointment_date)->format('F d, Y') . ' at ' . Carbon::parse($this->appointment->appointment_time)->format('h:i A') . ' has been canceled.')
        ->line('Please contact us if you have any questions or need further assistance.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
