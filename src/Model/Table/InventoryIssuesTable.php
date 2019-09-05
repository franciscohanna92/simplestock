<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryIssues Model
 *
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\BuildingSitesTable|\Cake\ORM\Association\BelongsTo $BuildingSites
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\BelongsToMany $Articles
 *
 * @method \App\Model\Entity\InventoryIssue get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryIssue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InventoryIssue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryIssue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryIssue|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryIssue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryIssue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryIssue findOrCreate($search, callable $callback = null, $options = [])
 */
class InventoryIssuesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('inventory_issues');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->belongsTo('BuildingSites', [
            'foreignKey' => 'building_site_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsToMany('Articles', [
            'foreignKey' => 'inventory_issue_id',
            'targetForeignKey' => 'article_id',
            'joinTable' => 'inventory_issues_articles'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('descriptive_name')
            ->maxLength('descriptive_name', 255)
            ->allowEmpty('descriptive_name');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->integer('updated_by')
            ->allowEmpty('updated_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['building_site_id'], 'BuildingSites'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
