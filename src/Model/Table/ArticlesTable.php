<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsTo $Providers
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\InventoryIssuesTable|\Cake\ORM\Association\BelongsToMany $InventoryIssues
 * @property \App\Model\Table\InventoryReceiptsTable|\Cake\ORM\Association\BelongsToMany $InventoryReceipts
 * @property \App\Model\Table\PurchaseOrdersTable|\Cake\ORM\Association\BelongsToMany $PurchaseOrders
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'cateogry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsToMany('InventoryIssues', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'inventory_issue_id',
            'joinTable' => 'inventory_issues_articles'
        ]);
        $this->belongsToMany('InventoryReceipts', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'inventory_receipt_id',
            'joinTable' => 'inventory_receipts_articles'
        ]);
        $this->belongsToMany('PurchaseOrders', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'purchase_order_id',
            'joinTable' => 'purchase_orders_articles'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('security_stock')
            ->requirePresence('security_stock', 'create')
            ->notEmpty('security_stock');

        $validator
            ->integer('stock')
            ->allowEmpty('stock');

        $validator
            ->scalar('internal_code')
            ->maxLength('internal_code', 255)
            ->allowEmpty('internal_code');

        $validator
            ->scalar('provider_code')
            ->maxLength('provider_code', 255)
            ->allowEmpty('provider_code');

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
        $rules->add($rules->existsIn(['cateogry_id'], 'Categories'));
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));

        return $rules;
    }
}
