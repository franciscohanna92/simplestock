<?php
use Migrations\AbstractMigration;

class SetUnitIdForeignKeyInArticles extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('articles');

        $table->addForeignKey('unit_id', 'units', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION']);
        $table->update();
    }

    public function down() {
        $table = $this->table('articles');
        $table->dropForeignKey('unit_id');
        $table->removeIndex(['unit_id']);
        $table->save();
    }
}
