<?php
use Migrations\AbstractMigration;

class AddRoleColumnToUsers extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('role', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 255,
            'after' => 'password'
        ]);

        $table->update();
    }

    public function down() {
        $table = $this->table('users');
        $table->removeColumn('role');
        $table->save();
    }
}
