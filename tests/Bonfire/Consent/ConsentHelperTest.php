<?php

namespace Tests\Bonfire\Consent;

use CodeIgniter\Config\Factories;
use Tests\Support\TestCase;

/**
 * @backupGlobals disabled
 */
class ConsentHelperTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        if (! function_exists('has_consent')) {
            helper('consent');
        }
        if (! function_exists('setting')) {
            helper('setting');
        }
        $_COOKIE = [];

        $config = config('Consent');
        $config->requireConsent = true;
        Factories::injectMock('config', 'Consent', $config);
    }

    public function testGroupNotExist()
    {
        $_COOKIE['bf_consent'] = json_encode([
            'consent' => 1,
            'required' => 1,
            'ads' => 0
        ]);

        $this->assertFalse(has_consent('foo'));
    }

    public function testGroupNotGiven()
    {
        $_COOKIE['bf_consent'] = json_encode([
             'consent' => 1,
             'required' => 1,
             'ads' => 0
         ]);

        $this->assertTrue(has_consent('required'));
        $this->assertFalse(has_consent('ads'));
    }

    public function testDefaultNoConsent()
    {
        $this->assertFalse(has_consent('foo'));
    }
}
