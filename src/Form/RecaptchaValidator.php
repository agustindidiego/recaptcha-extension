<?php namespace Rage\RecaptchaExtension\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Http\Request;

class RecaptchaValidator
{

	protected $captcha;
	protected $request;

	public function __construct(Request $request)
	{
		$this->captcha = app('captcha');
		$this->request = $request;
	}

	public function handle(FormBuilder $builder)
	{
		return $this->captcha->verifyResponse($this->request->get('g-recaptcha-response'), $this->request->getClientIp());
	}
}
