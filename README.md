# recaptcha-extension
PyroCMS - Recaptcha Field Type

# Usage
Just include this into your FormBuilder
```php
protected $options = [
    'captcha' => true
];
```

And configure your ReCaptcha keys in your env file

```text
NOCAPTCHA_SITEKEY=[yoursitekey]
NOCAPTCHA_SECRET=[yoursecret]
```