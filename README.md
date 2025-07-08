# Laravel SMS Service 📲

**Multi-channel SMS & Telegram bot messaging service for Laravel**, with support for:

- 📡 PlayMobile (SMS + Voice call)
- 💬 Eskiz SMS
- 📬 Sysdc
- 🤖 Telegram Bot

> Developed by [@islamabdurahman](https://github.com/islamabdurahman)

---

## 📦 Installation

```bash
composer require islamabdurahman/laravel-sms-service:dev-main
```

```bash
php artisan vendor:publish --tag=sms-config
```


## 📦 Add to .env file
```
# PlayMobile SMS
SMS_PLAYMOBILE_KEY=your_key
SMS_PLAYMOBILE_SECRET=your_secret
SMS_PLAYMOBILE_NICKNAME=your_nickname

# PlayMobile Voice Call
SMS_PLAYMOBILE_CALL_FILE=audio.mp3

# Eskiz SMS
SMS_ESKIZ_TOKEN=your_token

# Sysdc
SMS_SYSDS_TOKEN=your_token

# Telegram Bot
TELEGRAM_BOT_TOKEN=your_bot_token

```