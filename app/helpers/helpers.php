<?php
use Illuminate\Support\Facades\Mail;

function send_mail($data, $message = null, $email, $template, $subject = 'Project Management'){
    $mail = Mail::send($template, ['body' => $data], function ($message) use ($email, $subject) {
        $message->sender(env('Admin_Mail'));
        $message->subject($subject);
        $message->to($email);
    });

    return $mail;
}