<?php
use Migrations\AbstractMigration;

class AddEmployeeIdColumnToInventoryReceipts extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_receipts');
        $table->addColumn('employee_id', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11,
            'after' => 'provider_id'
        ]);

        $table->update();
    }

    public function down() {
        $table = $this->table('inventory_receipts');
        $table->removeColumn('employee_id');
        $table->save();
    }
}
