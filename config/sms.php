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
        'token' => env('SMS_ESKIZ_TOKEN'),
    ],

    'sysdc' => [
        'token' => env('SMS_SYSDS_TOKEN'),
    ],

    'telegram' => [
        'token' => env('TELEGRAM_BOT_TOKEN'),
    ],
];
