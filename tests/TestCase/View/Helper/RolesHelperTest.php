<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\RolesHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\RolesHelper Test Case
 */
class RolesHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\RolesHelper
     */
    public $Roles;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Roles = new RolesHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
