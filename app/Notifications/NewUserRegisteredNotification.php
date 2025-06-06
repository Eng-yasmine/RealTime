<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegisteredNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($newUser)
    {
        $this->user = $newUser;
        // هنا ممكن احفظ الداتا في الداتا بيز
        // UserNotification::create([
        //     'user_id' => $newUser->id,
        //     'message' => 'New user registered: ' . $newUser->name,
        // ]);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // via دي مهمه جدا لانها بتحدد القنوات اللي هتستخدمها علشان تبعت النوتيفيكيشن
        // ممكن ترجعلي اكتر من قناة زي مثلا
        // ['mail', 'database'] لو عايز تبعت نوتيفيكيشن عن طريق الميل وكمان تخزنها في الداتا بيز
        // لو عايز تخزنها في الداتا بيز بس ممكن ترجعلي قناة واحدة بس
        // لو عايز تبعت نوتيفيكيشن عن طريق الميل بس ممكن ترجعلي قناة واحدة بس
        // لو عايز تبعت نوتيفيكيشن عن طريق الويب هوك ممكن ترجعلي قناة واحدة بس
        // return ['mail']; انا هغيرها واخليها ترجعلي الداتا بيز
        return [ 'database'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'message' => 'New user registered: ' . $this->user->name,
            'created_at' => now()->toDateTimeString(),
            'user_id' => $this->user->id,
            //دي كدا بحدد الداتا اللي هتتخزن معايا في الداتا بيز بتاعة النوتيفيكيشن
            // ممكن اضيف اي داتا تانية زي مثلا رقم التليفون او اي داتا تانية انا عايزها
            //دي هتتخزن في جدول النوتفيكينش في كولوم هتلاقيه اسمه الداتا
        ];
    }
}
