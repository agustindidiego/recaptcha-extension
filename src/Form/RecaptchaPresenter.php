<?php namespace Rage\RecaptchaExtension\Form;


use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

class RecaptchaPresenter extends FieldTypePresenter
{

	public function captcha()
	{
		return app('captcha');
	}

	public function __toString()
    {
        return $this->captcha()->display();
    }
}
