<?php
use Migrations\AbstractMigration;

class ChangeProviderNameColumns extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('providers');
        $table->renameColumn('company_name', 'name');
        $table->removeColumn('employee_name');
        $table->removeColumn('employee_surname');
        $table->save();
    }

    public function down()
    {
        $table = $this->table('providers');
        $table->renameColumn('name', 'company_name');
        $table->addColumn('employee_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'after' => 'id'
        ]);
        $table->addColumn('employee_surname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'after' => 'id'
        ]);
        $table->save();
    }
}
