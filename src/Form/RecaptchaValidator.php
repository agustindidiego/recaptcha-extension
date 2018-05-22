<?php
/**
 *  [DESCRIPTION]
 *
 * @author      agustin
 * @category    Interactiv4
 * @package     Interactiv4_[MODULE]
 * @copyright   Copyright (c) 2017 Interactiv4, Inc. (http://www.interactiv4.com)
 */

namespace Rage\RecaptchaExtension\Form;


use Anhskohbo\NoCaptcha\NoCaptcha;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Http\Request;

class RecaptchaValidator
{

	protected $captcha;
	protected $request;

	public function __construct(NoCaptcha $captcha, Request $request)
	{
		$this->captcha = $captcha;
		$this->request = $request;
	}

	public function handle(FormBuilder $builder)
	{
		return $this->captcha->verifyResponse('test', $this->request->getClientIp());
	}
}