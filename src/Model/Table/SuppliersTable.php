<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use LDAP\Result;

/**
 * Suppliers Model
 *
 * @property \App\Model\Table\DeviceTable&\Cake\ORM\Association\HasMany $Device
 *
 * @method \App\Model\Entity\Supplier newEmptyEntity()
 * @method \App\Model\Entity\Supplier newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SuppliersTable extends Table
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

        $this->setTable('suppliers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Device', [
            'foreignKey' => 'supplier_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function getAll($condition = [], $contain = [])
    {
        $result = $this->find('all')->where($condition)->contain($contain);
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    public function getOne($condition = [], $contain = [])
    {
        $result = $this->find('all')->where($condition)->contain($contain)->first();
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }
    public function createSupplier($data = [], $createdBy = null)
    {
        $newSupplier = $this->newEmptyEntity($data);
        $newSupplier->name = $data['name'];
        $newSupplier->description = $data['description'];
        $newSupplier->created_by = $createdBy;
        if ($this->save($newSupplier)) {
            return true;
        } else return false;
    }
    public function deleteSupplier($id = null, $updatedBy = null)
    {
        $supplier = $this->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id], []);
        $supplier->del_flag = DEL_FLAG;
        $supplier->updated_by = $updatedBy;
        // $supplier->active = INACTIVE;
        if (!empty($supplier)) {
            if ($this->save($supplier)) {
                return true;
            } else return false;
        } else false;
    }
    public function editSupplier($id = null, $data = [], $updatedBy = null)
    {
        // $supplier = $this->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        $supplier = $this->find()->where(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id])->first();
        $supplier->name = $data['name'];
        $supplier->description = $data['description'];
        $supplier->updated_by = $updatedBy;
        if (!empty($supplier)) {
            if ($this->save($supplier)) {
                return true;
            } else return false;
        } else false;
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create', 'khong duoc de trong')
            // ->notBlank('name', 'alo')
            ->notEmptyString('name', 'not empty fild');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->notEmptyString('del_flag');

        return $validator;
    }
}
