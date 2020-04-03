<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RolesComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RolesComponent Test Case
 */
class RolesComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\RolesComponent
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
        $registry = new ComponentRegistry();
        $this->Roles = new RolesComponent($registry);
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
