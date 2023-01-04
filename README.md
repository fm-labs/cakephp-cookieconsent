# cakephp-cookieconsent

Cookie consent plugin for CakePHP

Uses the free javascript solution from `osano/cookieconsent`

https://github.com/osano/cookieconsent


## Installation

    composer require fm-labs/cakephp-cookieconsent


## Usage

```php 
// Enable plugin in Application's boostrap method
public function bootstrap() {
    // ... other boootstrap code
    $this->addPlugin('Cookieconsent');
}
```

### Use helper in layout templates


```php 
// Example layout template
<?php
$this->loadHelper('Cookieconsent.Cookieconsent');
?>
<html>
    <body>
        <!-- ... other html code ... -->
        <?= $this->Cookieconsent->render(); ?>
    </body>
<html>
```

## Configuration

```php
$this->loadHelper('Cookieconsent', [
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
            'header' => 'Diese Webseite benutzt Cookies.',
            'message' => 'Diese Webseite benutzt Cookies um Ihnen die bestmögliche Nutzung unserer Services zu ermöglichen.',
            'dismiss' => 'Verstanden',
            'link' => 'Datenschutzerklärung',
            'href' => '/datenschutz',
        ],
        'cookie' => [
            'name' => 'cookie_law',
            'path' => '/',
            //'domain' => null,
            'expiryDays' => 365,
        ]
    ]
);
```