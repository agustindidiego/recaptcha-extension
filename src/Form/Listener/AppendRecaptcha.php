<?php
/**
 *  [DESCRIPTION]
 *
 * @author      agustin
 * @category    Interactiv4
 * @package     Interactiv4_[MODULE]
 * @copyright   Copyright (c) 2017 Interactiv4, Inc. (http://www.interactiv4.com)
 */

namespace Rage\RecaptchaExtension\Form\Listener;


use Anomaly\Streams\Platform\Ui\Form\Event\FormWasBuilt;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class AppendRecaptcha
{

	protected $form;

	/**
	 * Create a new TouchLastActivity instance.
	 *
	 * @param FormBuilder             $form
	 */
	public function __construct(FormBuilder $form)
	{
		$this->form  = $form;
	}

	/**
	 * Handle the event.
	 */
	public function handle(FormWasBuilt $event)
	{

		$event->getBuilder();
	}

}