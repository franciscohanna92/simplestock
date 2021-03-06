<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryIssue Entity
 *
 * @property int $id
 * @property string|null $descriptive_name
 * @property \Cake\I18n\FrozenDate $date
 * @property int|null $employee_id
 * @property int|null $building_site_id
 * @property int|null $company_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $updated_by
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\BuildingSite $building_site
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Article[] $articles
 */
class InventoryIssue extends Entity
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
        'descriptive_name' => true,
        'date' => true,
        'employee_id' => true,
        'building_site_id' => true,
        'company_id' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'employee' => true,
        'building_site' => true,
        'company' => true,
        'articles' => true
    ];
}
