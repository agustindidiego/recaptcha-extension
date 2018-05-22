<?php namespace Rage\RecaptchaExtension;

use Anhskohbo\NoCaptcha\NoCaptcha;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Ui\Form\Component\Field\FieldFactory;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Rage\RecaptchaExtension\Form\RecaptchaPresenter;
use Rage\RecaptchaExtension\Form\RecaptchaValidator;
use Rage\ReviewsModule\Comment\Form\CommentFormBuilder;

class RecaptchaExtensionServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [];

    protected $middleware = [];

    protected $listeners = [
	    'Anomaly\Streams\Platform\Ui\Form\Event\FormWasBuilt' => [
		    'Rage\RecaptchaExtension\Form\Listener\AppendRecaptcha',
	    ],
    ];

    protected $aliases = [
//	    'Anomaly\Streams\Platform\Ui\Form\FormBuilder' => 'form'
    ];

    protected $bindings = [
	    'Anomaly\Streams\Platform\Ui\Form\FormBuilder'                              => 'Anomaly\Streams\Platform\Ui\Form\FormBuilder',
	    'Anomaly\Streams\Platform\Ui\Form\Form'                              => 'Anomaly\Streams\Platform\Ui\Form\Form',
//	    'Anhskohbo\NoCaptcha\NoCaptcha'                              => 'Anhskohbo\NoCaptcha\NoCaptcha',
    ];

    protected $providers = [
	    'Anhskohbo\NoCaptcha\NoCaptchaServiceProvider',
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

	    $formBuilder->listen('built', function($builder, FieldFactory $factory){
		    /** @var $builder FormBuilder */

		    if($builder->getOption('captcha'))
		    {

			    $builder->addFormField($factory->make(
				    [
					    'field'    => 'captcha',
					    'type'     => 'anomaly.field_type.text',
					    'label'    => 'Captcha',
					    'inputView'=> 'rage.extension.recaptcha::input',
				        'disabled' => true,
					    'required' => true,
					    'rules'     => [
					    	'captcha',
					    ],
				        'presenter' => RecaptchaPresenter::class,
				        'config'    => [
				        	'disable_label'    => true,
				            'type'              => 'hidden'
				        ],
				        'value' => 1
				    ]
			    ));
		    }

	    });

    }

    public function map()
    {
    }

}
