<?php

use Migrations\AbstractMigration;

class InsertDefaultUnits extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('units');
        $rows = [
            [
                "name" => "litros",
                "abbreviation" => "L"
            ],
            [
                "name" => "metros",
                "abbreviation" => "m"
            ],
            [
                "name" => "kilogramos",
                "abbreviation" => "kg"
            ],
            [
                "name" => "cajas",
                "abbreviation" => "caj"
            ],
            [
                "name" => "metros",
                "abbreviation" => "m"
            ],
            [
                "name" => "unidades",
                "abbreviation" => "uds"
            ],
        ];

        $table->insert($rows)->save();
    }
}
