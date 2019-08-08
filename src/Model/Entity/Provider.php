<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provider Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $website
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $cuit
 * @property string|null $observations
 * @property int $city_id
 * @property int|null $company_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $updated_by
 * @property int|null $province_id
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 */
class Provider extends Entity
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
        'name' => true,
        'address' => true,
        'website' => true,
        'email' => true,
        'phone' => true,
        'cuit' => true,
        'observations' => true,
        'city_id' => true,
        'company_id' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'province_id' => true,
        'city' => true,
        'company' => true,
        'province' => true,
        'articles' => true,
        'purchase_orders' => true
    ];
}
