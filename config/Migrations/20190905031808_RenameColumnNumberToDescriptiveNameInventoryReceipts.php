<?php

use Migrations\AbstractMigration;

class RenameColumnNumberToDescriptiveNameInventoryReceipts extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_receipts');
        $table->renameColumn('number', 'descriptive_name');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('inventory_receipts');
        $table->renameColumn('descriptive_name', 'number');
        $table->update();
    }
}
