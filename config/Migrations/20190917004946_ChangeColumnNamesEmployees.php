<?php
use Migrations\AbstractMigration;

class ChangeColumnNamesEmployees extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('employees');
        $table->renameColumn('surname', 'lastname');
        $table->renameColumn('cuil', 'dni');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('employees');
        $table->renameColumn('lastname', 'surname');
        $table->renameColumn('dni', 'cuil');
        $table->update();
    }
}
