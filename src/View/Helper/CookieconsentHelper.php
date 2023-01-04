<?php
declare(strict_types=1);

namespace Cookieconsent\View\Helper;

use Cake\Utility\Text;
use Cake\View\Helper;

/**
 * Cookieconsent helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class CookieconsentHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        'autoRender' => true,
        'palette' => [
            'popup' => ['background' => '#edeff5', 'text' => '#838391'],
            'button' => ['background' => '#4b81e8']
        ],
        'type' => 'info',
        'position' => 'bottom',
        'revokable' => false,
        'autoOpen' => true,
        'law' => ['countryCode' => 'AT', 'regionalLaw' => true],
        'location' => false,
        'content' => [
            'header' => '',
            'message' => '',
            'dismiss' => '',
            'link' => '',
            'href' => '',
        ],
        'cookie' => [
            'name' => 'cookie_law',
            'path' => '',
            'domain' => '',
            'expiryDays' => 365,
        ]
    ];

    public function render() {
        $scriptTemplate = <<<SCRIPT
    window.cookieconsent.initialise(%s);
    window.cookieconsent.onStatusChange = function(status) {
        console.log(this.hasConsented() ?
            'enable cookies' : 'disable cookies');
    };
SCRIPT;
        $script = sprintf($scriptTemplate, json_encode($this->getConfig()));
        return $this->Html->scriptBlock($script);
    }
}
