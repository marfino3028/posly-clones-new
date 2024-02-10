<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $confirmationLink;

    public function __construct($user, $confirmationLink)
    {
        $this->user = $user;
        $this->confirmationLink = $confirmationLink;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Confirm Email', $this->confirmationLink)
            ->line('Thank you for using our application!');
    }
    public function via($notifiable)
    {
        return ['mail']; // Specify the notification channel (e.g., 'mail', 'database', 'broadcast')
    }

    // Jika Anda ingin mengirim notifikasi melalui saluran lain, tambahkan metode berikut:
    // public function toWhatsapp($notifiable)
    // {
    //     // Implementasikan logika pengiriman pesan WhatsApp di sini
    // }

    public function toArray($notifiable)
    {
        return [
            // Array data untuk notifikasi
        ];
    }
}
