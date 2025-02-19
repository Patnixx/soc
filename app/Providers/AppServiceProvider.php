<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use App\View\Components\authHref;
use App\View\Components\authIconDiv;
use App\View\Components\courseDiv;
use App\View\Components\courseInputDiv;
use App\View\Components\courseUserDiv;
use App\View\Components\formDiv;
use App\View\Components\formInputDiv;
use App\View\Components\inputDiv;
use App\View\Components\showPassInput;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('auth-icon-div', authIconDiv::class);
        Blade::component('show-pass-input', showPassInput::class);
        Blade::component('auth-href', authHref::class);
        Blade::component('course-div', courseDiv::class);
        Blade::component('form-div', formDiv::class);
        Blade::component('form-input-div', formInputDiv::class);
        Blade::component('course-input-div', courseInputDiv::class);
        Blade::component('input-div', inputDiv::class);
        Blade::component('course-user-div', courseUserDiv::class);
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
