<?php
use Migrations\AbstractMigration;

class ChangeColumnObservationsTypeToTextProviders extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('providers');
        $table->changeColumn('observations', 'text');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('providers');
        $table->changeColumn('observations', 'string', [
            'limit' => 255,
        ]);
        $table->update();
    }
}
