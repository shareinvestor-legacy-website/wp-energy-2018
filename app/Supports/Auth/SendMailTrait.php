<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 9/22/2016
 * Time: 15:30
 */

namespace BlazeCMS\Supports\Auth;



use Illuminate\Notifications\Notifiable;

trait SendMailTrait
{
    use Notifiable;



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordEmail($token));
    }
}