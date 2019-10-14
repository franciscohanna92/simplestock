<?php
use Migrations\AbstractMigration;

class ChangeInvetoryReceiptsProvidersIdColumnName extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('inventory_receipts');
        $table->renameColumn('providers_id', 'provider_id');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('inventory_receipts');
        $table->renameColumn('provider_id', 'providers_id');
        $table->update();
    }
}
