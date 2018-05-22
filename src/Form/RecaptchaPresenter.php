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


use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

class RecaptchaPresenter extends FieldTypePresenter
{

	public function captcha()
	{
		return app('captcha')->display();
	}
}