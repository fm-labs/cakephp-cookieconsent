<?php
declare(strict_types=1);

namespace Cookieconsent\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cookieconsent\View\Helper\CookieconsentHelper;

/**
 * Cookieconsent\View\Helper\CookieconsentHelper Test Case
 */
class CookieconsentHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Cookieconsent\View\Helper\CookieconsentHelper
     */
    protected $Cookieconsent;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Cookieconsent = new CookieconsentHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cookieconsent);

        parent::tearDown();
    }
}
