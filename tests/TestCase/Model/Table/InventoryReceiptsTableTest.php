<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryReceiptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryReceiptsTable Test Case
 */
class InventoryReceiptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InventoryReceiptsTable
     */
    public $InventoryReceipts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_receipts',
        'app.providers',
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
        $config = TableRegistry::getTableLocator()->exists('InventoryReceipts') ? [] : ['className' => InventoryReceiptsTable::class];
        $this->InventoryReceipts = TableRegistry::getTableLocator()->get('InventoryReceipts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryReceipts);

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
