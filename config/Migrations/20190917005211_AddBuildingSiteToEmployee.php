<?php
use Migrations\AbstractMigration;

class AddBuildingSiteToEmployee extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('employees');
        $table->addColumn('building_site_id', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11,
            'after' => 'company_id'
        ]);

        $table->update();
    }

    public function down() {
        $table = $this->table('employees');
        $table->removeColumn('building_site_id');
        $table->save();
    }
}
