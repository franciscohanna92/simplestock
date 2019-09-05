<?php
use Migrations\AbstractMigration;

class AddDescriptiveNameColumnToInventoryIssues extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_issues');

        $table->addColumn('descriptive_name', 'string', [
            'default' => null,
            'null' => true,
            'after' => 'id'
        ]);

        $table->update();
    }

    public function down() {
        $table = $this->table('inventory_issues');
        $table->removeColumn('descriptive_name');
        $table->save();
    }
}
