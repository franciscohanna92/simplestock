<?php
use Migrations\AbstractMigration;

class SetBuildingSiteForeignKeyEmployee extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('employees');

        $table->addForeignKey('building_site_id', 'building_sites', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION']);
        $table->update();
    }

    public function down() {
        $table = $this->table('employees');
        $table->dropForeignKey('building_site_id');
        $table->removeIndex(['building_site_id']);
        $table->save();
    }
}
