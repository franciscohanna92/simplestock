<?php

use Migrations\AbstractMigration;

class CreateUnitsTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('units');

        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('abbreviation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created_by', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('updated_by', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addIndex([
            'id',
        ], [
            'name' => 'identity',
            'unique' => true,
        ]);
        $table->addTimestamps();
        $table->create();
    }

    public function down()
    {
        $this->table('units')->drop()->save();
    }
}
