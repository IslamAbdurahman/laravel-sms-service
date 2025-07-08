<?php

namespace IslamAbdurahman\SmsService\Providers;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/sms.php', 'sms');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/sms.php' => config_path('sms.php'),
        ], 'sms-config');
    }
}
