<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingSitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingSitesTable Test Case
 */
class BuildingSitesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingSitesTable
     */
    public $BuildingSites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.building_sites',
        'app.companies',
        'app.inventory_issues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BuildingSites') ? [] : ['className' => BuildingSitesTable::class];
        $this->BuildingSites = TableRegistry::getTableLocator()->get('BuildingSites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BuildingSites);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
