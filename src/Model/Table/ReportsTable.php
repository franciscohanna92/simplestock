<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reports Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Report get($primaryKey, $options = [])
 * @method \App\Model\Entity\Report newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Report[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Report|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Report[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Report findOrCreate($search, callable $callback = null, $options = [])
 */
class ReportsTable extends Table
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

        $this->setTable('reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
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
            ->date('date_from')
            ->requirePresence('date_from', 'create')
            ->notEmpty('date_from');

        $validator
            ->date('date_to')
            ->requirePresence('date_to', 'create')
            ->notEmpty('date_to');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
