<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingSite Entity
 *
 * @property int $id
 * @property string|null $name
 * @property \Cake\I18n\FrozenDate|null $start_date
 * @property string|null $address
 * @property string|null $observations
 * @property int|null $company_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $updated_by
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\InventoryIssue[] $inventory_issues
 */
class BuildingSite extends Entity
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
        'start_date' => true,
        'address' => true,
        'observations' => true,
        'company_id' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'company' => true,
        'inventory_issues' => true
    ];
}
