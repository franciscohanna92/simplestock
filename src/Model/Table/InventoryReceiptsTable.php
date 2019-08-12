<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryReceipts Model
 *
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsTo $Providers
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\BelongsToMany $Articles
 *
 * @method \App\Model\Entity\InventoryReceipt get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryReceipt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InventoryReceipt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryReceipt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryReceipt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryReceipt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryReceipt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryReceipt findOrCreate($search, callable $callback = null, $options = [])
 */
class InventoryReceiptsTable extends Table
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

        $this->setTable('inventory_receipts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Providers', [
            'foreignKey' => 'providers_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsToMany('Articles', [
            'foreignKey' => 'inventory_receipt_id',
            'targetForeignKey' => 'article_id',
            'joinTable' => 'inventory_receipts_articles'
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
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->scalar('number')
            ->maxLength('number', 255)
            ->allowEmpty('number');

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
        $rules->add($rules->existsIn(['providers_id'], 'Providers'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
