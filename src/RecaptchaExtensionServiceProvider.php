<?php namespace Rage\RecaptchaExtension;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Ui\Form\Component\Field\FieldFactory;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Rage\RecaptchaExtension\Form\RecaptchaPresenter;
use Rage\RecaptchaExtension\Form\RecaptchaValidator;
use Anomaly\Streams\Platform\Ui\Form\Event\FormWasBuilt;
use Rage\RecaptchaExtension\Form\Listener\AppendRecaptcha;
use Anhskohbo\NoCaptcha\NoCaptchaServiceProvider;

class RecaptchaExtensionServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [];

    protected $middleware = [];

    protected $listeners = [
	    FormWasBuilt::class => [
            AppendRecaptcha::class,
	    ],
    ];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [
        NoCaptchaServiceProvider::class,
    ];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

	public function boot()
	{
		$this->app;
	}

    public function register(FormBuilder $formBuilder)
    {

	    $formBuilder->listen('ready', function($builder, FieldFactory $factory){
		    /** @var $builder FormBuilder */

		    if($builder->getOption('captcha'))
		    {
                $builder->addField('captcha', [
                    'type'     => 'anomaly.field_type.text',
                    'label'    => 'Captcha',
                    'inputView'=> 'rage.extension.recaptcha::input',
                    'disabled' => false,
                    'readonly' => true,
                    'required' => true,
                    'rules'     => [
                        'captcha',
                    ],
                    'messages' => [
                        'captcha' => 'rage.extension.recaptcha::validation.captcha'
                    ],
                    'validators' => [
                        'captcha' => [
                            'handler' => RecaptchaValidator::class,
                            'message' => 'The date/time format is invalid.',
                        ],
                    ],
                    'presenter' => RecaptchaPresenter::class,
                    'config'    => [
                        'disable_label'    => true,
                        'type'              => 'hidden'
                    ],
                    'value' => 1
                ]);
		    }

	    });

    }

}
