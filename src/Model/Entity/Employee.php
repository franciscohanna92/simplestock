<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string|null $dni
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $position
 * @property string|null $observations
 * @property int|null $company_id
 * @property int|null $building_site_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\BuildingSite $building_site
 * @property \App\Model\Entity\InventoryIssue[] $inventory_issues
 */
class Employee extends Entity
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
        'lastname' => true,
        'dni' => true,
        'phone' => true,
        'email' => true,
        'address' => true,
        'position' => true,
        'observations' => true,
        'company_id' => true,
        'building_site_id' => true,
        'created_at' => true,
        'updated_by' => true,
        'created_by' => true,
        'updated_at' => true,
        'company' => true,
        'building_site' => true,
        'inventory_issues' => true
    ];
}
