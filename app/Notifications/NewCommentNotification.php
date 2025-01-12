<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewCommentNotification extends Notification
{
    public $thread;

    public function __construct($thread)
    {
        $this->thread = $thread;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Komentar baru di thread Anda.')
            ->action('Lihat Thread', url('/threads/' . $this->thread->id))
            ->line('Terima kasih telah menggunakan Komunitas Belajar!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Komentar baru di thread Anda: ' . $this->thread->title,
            'thread_id' => $this->thread->id,
        ];
    }
}
