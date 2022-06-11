<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        ///create the email that will be send to the user
        VerifyEmail::toMailUsing(function ($notifiable , $url){
            $spaurl = "http://spa.test?email_verify_url=" . $url;
            ////this url to go next after verify
            return (new MailMessage())
                ->subject('verify email address')
                ->line('click the button below to verify your email')
                ->action('verify email address' , $spaurl);
        });
    }
}
