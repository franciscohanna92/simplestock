<?php
use Migrations\AbstractMigration;

class AllowNullEmployeeIdInventoryIssues extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_issues');
        $table->changeColumn('employee_id', 'integer', [
            'null' => true,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('inventory_issues');
        $table->changeColumn('employee_id', 'integer', [
            'null' => false,
        ]);
        $table->update();
    }
}
