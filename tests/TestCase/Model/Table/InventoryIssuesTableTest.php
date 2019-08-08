<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryIssuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryIssuesTable Test Case
 */
class InventoryIssuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InventoryIssuesTable
     */
    public $InventoryIssues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_issues',
        'app.employees',
        'app.building_sites',
        'app.companies',
        'app.articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InventoryIssues') ? [] : ['className' => InventoryIssuesTable::class];
        $this->InventoryIssues = TableRegistry::getTableLocator()->get('InventoryIssues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryIssues);

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
