<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseOrder Entity
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $observations
 * @property int $provider_id
 * @property int $status_id
 * @property int|null $company_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $updated_by
 *
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\PurchaseOrdersStatus $purchase_orders_status
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Article[] $articles
 */
class PurchaseOrder extends Entity
{

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
        'date' => true,
        'observations' => true,
        'provider_id' => true,
        'status_id' => true,
        'company_id' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'provider' => true,
        'purchase_orders_status' => true,
        'company' => true,
        'articles' => true
    ];
}
