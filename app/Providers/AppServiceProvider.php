<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Auth::check())
        {
            $lang = Auth::user()->language;
            if($lang == 'sk')
            {
                $subject = 'Overenie E-mailovej adresy';
                $line = 'Kliknite na tlačidlo nižšie pre overenie svojej e-mailovej adresy.';
                $action = 'Overiť E-mail';
                $this->message($subject, $line, $action);
            }
            else
            {
                $subject = 'Verify Your Email Address';
                $line = "Before accessing this feature, please verify your email address. If you haven't received the email, we can send another.";
                $action = 'Resend Verification Link';
                $this->message($subject, $line, $action);
            }
        }
    }

    public function message($subject, $line, $action)
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url, $subject, $line, $action) {
            return (new MailMessage)
                ->subject($subject)
                ->line($line)
                ->action($action, $url);
        });
    }
}
