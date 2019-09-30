<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $security_stock
 * @property int|null $stock
 * @property string|null $internal_code
 * @property string|null $provider_code
 * @property int $cateogry_id
 * @property int $unit_id
 * @property int|null $provider_id
 * @property int|null $company_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $updated_by
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\InventoryIssue[] $inventory_issues
 * @property \App\Model\Entity\InventoryReceipt[] $inventory_receipts
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 */
class Article extends Entity
{

    protected $_virtual = ['low_stock'];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'security_stock' => true,
        'stock' => true,
        'internal_code' => true,
        'provider_code' => true,
        'cateogry_id' => true,
        'provider_id' => true,
        'unit_id' => true,
        'company_id' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'category' => true,
        'provider' => true,
        'company' => true,
        'inventory_issues' => true,
        'inventory_receipts' => true,
        'purchase_orders' => true
    ];

    protected function _getLowStock()
    {
        return $this->stock < $this->security_stock;
    }
}
