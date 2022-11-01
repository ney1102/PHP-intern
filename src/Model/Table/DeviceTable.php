<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Device Model
 *
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\AssignTable&\Cake\ORM\Association\HasMany $Assign
 * @property \App\Model\Table\AttachedImageTable&\Cake\ORM\Association\HasMany $AttachedImage
 * @property \App\Model\Table\HistoryTable&\Cake\ORM\Association\HasMany $History
 *
 * @method \App\Model\Entity\Device newEmptyEntity()
 * @method \App\Model\Entity\Device newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Device[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Device get($primaryKey, $options = [])
 * @method \App\Model\Entity\Device findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Device patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Device[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Device|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DeviceTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('device');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Type', [
            'foreignKey' => 'device_type'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Assign', [
            'foreignKey' => 'device_id',
        ]);
        $this->hasMany('AttachedImage', [
            'foreignKey' => 'device_id',
        ]);
        $this->hasMany('History', [
            'foreignKey' => 'device_id',
        ]);
    }
    public function getAll()
    {
        $result = $this->find()->where(['del_flag' => UNDEL, 'active' => ACTIVE]);
        if (!empty($result)) {
            return $result;
        } else return false;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('serial')
            ->maxLength('serial', 255)
            ->requirePresence('serial', 'create')
            ->notEmptyString('serial');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('property_type')
            ->maxLength('property_type', 255)
            ->requirePresence('property_type', 'create')
            ->notEmptyString('property_type');

        $validator
            ->integer('device_type')
            ->requirePresence('device_type', 'create')
            ->notEmptyString('device_type');

        $validator
            ->notEmptyString('supplier_id');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->dateTime('created_buy')
            ->notEmptyDateTime('created_buy');

        $validator
            ->integer('warranty_time')
            ->allowEmptyString('warranty_time');

        $validator
            ->integer('machine_status_id')
            ->requirePresence('machine_status_id', 'create')
            ->notEmptyString('machine_status_id');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->notEmptyString('status');

        $validator
            ->dateTime('created_on')
            ->notEmptyDateTime('created_on');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        $validator
            ->dateTime('updated_on')
            ->allowEmptyDateTime('updated_on');

        $validator
            ->integer('updated_by')
            ->allowEmptyString('updated_by');

        $validator
            ->boolean('del_flag')
            ->notEmptyString('del_flag');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('supplier_id', 'Suppliers'), ['errorField' => 'supplier_id']);
        return $rules;
    }
}
