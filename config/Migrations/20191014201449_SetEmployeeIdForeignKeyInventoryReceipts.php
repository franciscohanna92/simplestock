<?php
use Migrations\AbstractMigration;

class SetEmployeeIdForeignKeyInventoryReceipts extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_receipts');

        $table->addForeignKey('employee_id', 'employees', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION']);
        $table->update();
    }

    public function down() {
        $table = $this->table('inventory_receipts');
        $table->dropForeignKey('employee_id');
        $table->removeIndex(['employee_id']);
        $table->save();
    }
}
