<?php

namespace IslamAbdurahman\SmsService;

use Illuminate\Support\Facades\Http;
use Telegram\Bot\Api;

class SmsService
{
    public static function telegramBot($chatId, $message)
    {
        $token = config('sms.telegram_token');

        try {
            $telegram = new Api($token);
            $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
            ]);
            return 1;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function eskiz($num, $message)
    {
        $config = config('sms.eskiz');
        $token = Cache::remember($config['token_cache_key'], $config['token_lifetime'], function () use ($config) {
            $response = Http::asForm()->post($config['api_url'] . 'auth/login', [
                'email' => $config['email'],
                'password' => $config['password'],
            ]);

            $json = $response->json();
            if (isset($json['data']['token'])) {
                return $json['data']['token'];
            }

            throw new \Exception('Eskiz auth error: ' . ($json['message'] ?? 'Unknown'));
        });

        $response = Http::withToken($token)
            ->asForm()
            ->post($config['api_url'] . 'message/sms/send', [
                'mobile_phone' => $num,
                'message' => $message,
                'from' => $config['sender'],
            ]);

        $json = $response->json();

        return ($json['status'] ?? null) === 'waiting' ? 1 : 0;
    }

    public static function sysdc($num, $message)
    {
        $token = config('sms.sysdc_token');
        $url = 'https://sms.sysdc.ru/index.php';

        $res = Http::withToken($token)
            ->attach('mobile_phone', $num)
            ->attach('message', $message)
            ->post($url);

        $json = json_decode($res->body());
        return ($json->status ?? '') === 'waiting' ? 1 : 0;
    }

    public static function playMobile($num, $message)
    {
        $config = config('sms.playmobile');
        $key = $config['key'];
        $secret = $config['secret'];
        $nickname = $config['nickname'];

        $url = 'https://send.smsxabar.uz/broker-api/send';
        $data = [
            'recipient' => $num,
            'message-id' => uniqid(),
            'sms' => [
                'originator' => $nickname,
                'content' => ['text' => $message],
            ],
        ];

        $res = Http::withBasicAuth($key, $secret)->post($url, [
            'messages' => $data
        ]);

        return $res->body() === 'Request is received' ? 1 : 0;
    }

    public static function playMobileCall($num)
    {
        $config = config('sms.playmobile');
        $key = $config['key'];
        $secret = $config['secret'];
        $nickname = $config['nickname'];
        $file = $config['file'];

        $url = 'https://send.smsxabar.uz/broker-api/send';
        $data = [
            'recipient' => $num,
            'message-id' => uniqid(),
            'sms' => [
                'originator' => $nickname,
                'content' => ['file' => $file],
            ],
        ];

        $res = Http::withBasicAuth($key, $secret)->post($url, [
            'messages' => $data
        ]);

        return $res->body() === 'Request is received' ? 1 : 0;
    }
}
