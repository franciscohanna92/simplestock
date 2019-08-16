<?php

use Migrations\AbstractMigration;

class AddUnitsColumnToArticles extends AbstractMigration
{

    public function up()
    {
        $table = $this->table('articles');
        $table->addColumn('unit_id', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11,
            'after' => 'company_id'
        ]);

        $table->update();
    }

    public function down() {
        $table = $this->table('articles');
        $table->removeColumn('unit_id');
        $table->save();
    }
}
