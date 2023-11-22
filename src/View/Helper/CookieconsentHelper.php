<?php
declare(strict_types=1);

namespace Cookieconsent\View\Helper;

use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Utility\Hash;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Cookieconsent helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class CookieconsentHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        // helper config
        'autoRender' => true,
        'block' => 'cookieconsent',

        // cookieconsent config
        'palette' => [
            'popup' => ['background' => '#edeff5', 'text' => '#838391'],
            'button' => ['background' => '#4b81e8'],
        ],
        'type' => 'info',
        'position' => 'bottom',
        'revokable' => false,
        'autoOpen' => true,
        'law' => [
            'countryCode' => 'AT',
            'regionalLaw' => true,
        ],
        'location' => false,
        'content' => [
            'header' => 'Cookie consent',
            'message' => 'This website uses cookies.',
            'dismiss' => 'I agree',
            'link' => 'Privacy terms',
            'href' => '/privacy',
        ],
        'cookie' => [
            'name' => 'cookie_law',
            'path' => '/',
            //'domain' => null,
            'expiryDays' => 365,
        ],
    ];

    protected $_rendered = false;

    public function __construct(View $view, array $config = [])
    {
        // i18n default config
        $defaultI18nConfig = [
            'content' => [
                'header' => __d('cookieconsent', 'Cookie consent'),
                'message' => __d('cookieconsent', 'This website uses cookies to provide a better user experience of our services.'),
                'dismiss' => __d('cookieconsent', 'I agree'),
                'link' => __d('cookieconsent', 'Privacy terms'),
                'href' => '/privacy',
            ],
        ];

        $this->_defaultConfig = Hash::merge($this->_defaultConfig, $defaultI18nConfig, Configure::read('Cookieconsent'));

        parent::__construct($view, $config);
    }

    /**
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        // config override
        if (Configure::check('Cookieconsent')) {
            $this->setConfig(Configure::read('Cookieconsent'));
        }

        // load osana/cookieconsent libs
        $this->Html->css('Cookieconsent.cookieconsent.min.css', ['block' => 'css']);
        $this->Html->script('Cookieconsent.cookieconsent.min.js', ['block' => 'script']);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setHeader(string $value): static
    {
        $this->setConfig(['content' => ['header' => $value]]);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMessage(string $value): static
    {
        $this->setConfig(['content' => ['message' => $value]]);

        return $this;
    }

    /**
     * @param string $title
     * @param $url
     * @return $this
     */
    public function setLink(string $title, $url): static
    {
        $url = $this->Html->Url->build($url);
        $this->setConfig(['content' => ['link' => $title, 'href' => $url]]);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDismiss(string $value): static
    {
        $this->setConfig(['content' => ['dismiss' => $value]]);

        return $this;
    }

    /**
     * Render cookie consent script block
     * and return result.
     *
     * @param array $config
     * @return string
     */
    public function render(array $config = []): string {
        $scriptTemplate = <<<SCRIPT
    console.log("cookieconsent initializing ...");
    if (typeof window.cookieconsent !== "undefined") {
        window.cookieconsent.initialise(%s);
        window.cookieconsent.onStatusChange = function(status) {
            console.log(this.hasConsented() ?
                'cookie consent agreed' : 'cookie consent denied');
        };
    } else { console.warn("cookieconsent lib not loaded"); }
SCRIPT;
        $_config = array_merge($this->getConfig(), $config);
        unset($_config['autoRender']);
        unset($_config['block']);

        $script = sprintf($scriptTemplate, json_encode($_config));
        //$this->_rendered = true;

        return $this->Html->scriptBlock($script);
    }

    /**
     * @param EventInterface $event
     * @return void
     */
    public function beforeLayout(EventInterface $event): void
    {
        if ($this->getConfig('autoRender') /* && !$this->_rendered */) {
            /** @var \Cake\View\View $view */
            $view = $event->getSubject();

            $html = $this->render();
            $view->append($this->getConfig('block'), $html);
        }
    }
}
