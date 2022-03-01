<?php


namespace App\Listeners;


use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Notification;


class LogSendingMessage
{
    public function handle(MessageSending $event)
    {
        $notification = Notification::where('id',$event->data['notification']->id)->first();
        $notification->status = "Sending";
        $notification->save();
    }

    public function failed(MessageSending $event, $exception)
    {
        $notification = Notification::where('id',$event->data['notification']->id)->first();
        $notification->status = "Sending Event Failed";
        $notification->save();
    }
}
