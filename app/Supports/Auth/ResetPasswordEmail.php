<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 9/22/2016
 * Time: 15:19
 */

namespace BlazeCMS\Supports\Auth;


use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class ResetPasswordEmail extends  ResetPassword
{

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url('admin/password/reset', $this->token))
            ->line('If you did not request a password reset, no further action is required.');
    }
}