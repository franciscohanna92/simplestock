<?php
use Migrations\AbstractMigration;

class AllowNullCityIdProviders extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('providers');
        $table->changeColumn('city_id', 'integer', [
            'null' => true,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('providers');
        $table->changeColumn('city_id', 'integer', [
            'null' => false,
        ]);
        $table->update();
    }
}
