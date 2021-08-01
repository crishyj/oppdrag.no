<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Carbon\Carbon;

class ServiceProviderReviewNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    public $queue;
    protected $date;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->queue = config('queue.pre_fix').'notifications';
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // to enable oneSignal add this to via 'OneSignalChannel::class'
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \NotificationChannels\OneSignal\OneSignalMessage
     */
    public function toOneSignal($notifiable)
    {
        $data = ['data'=>[
            'title' => $this->data->title,
            'type' => $this->data->type,
            'text' => $this->data->message,
            'link_text' => $this->data->link_text,
            'route' => $this->data->route,
            'unread_count' => $this->data->to->unreadNotifications()->count(),
        ],
        'created_at' => $this->date
    ];
    return OneSignalMessage::create()
    ->subject($this->data->title)
    ->body(strip_tags($this->data->message))
    ->setData('data',$data);
}
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->data->title,
            'type' => $this->data->type,
            'text' => $this->data->message,
            'link_text' => $this->data->link_text,
            'route' => $this->data->route,
        ];
    }
    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
    */
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'data'=>[
                'title' => $this->data->title,
                'text' => $this->data->message,
                'link_text' => $this->data->link_text,
                'route' => $this->data->route,
            ],
            'created_at' => $this->date,
        ]))->onQueue($this->queue);
    }
}
