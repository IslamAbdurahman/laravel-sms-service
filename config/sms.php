<?php

return [

    'playmobile' => [
        'key' => env('SMS_PLAYMOBILE_KEY'),
        'secret' => env('SMS_PLAYMOBILE_SECRET'),
        'nickname' => env('SMS_PLAYMOBILE_NICKNAME'),
    ],

    'playmobile_call' => [
        'file' => env('SMS_PLAYMOBILE_CALL_FILE'),
    ],

    'eskiz' => [
        'email' => env('SMS_ESKIZ_EMAIL'),
        'password' => env('SMS_ESKIZ_PASSWORD'),
        'sender' => env('SMS_ESKIZ_SENDER', '4546'),
        'token_cache_key' => 'eskiz_sms_token',
        'token_lifetime' => env('SMS_ESKIZ_TOKEN_DURATION', 60 * 60 * 24 * 30), // default 30 days
        'api_url' => env('SMS_ESKIZ_URL', 'https://notify.eskiz.uz/api/'),
    ],

    'sysdc' => [
        'token' => env('SMS_SYSDS_TOKEN'),
    ],

    'telegram' => [
        'token' => env('TELEGRAM_BOT_TOKEN'),
    ],
];
