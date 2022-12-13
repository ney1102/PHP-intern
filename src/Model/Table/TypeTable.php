<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Type Model
 *
 * @method \App\Model\Entity\Type newEmptyEntity()
 * @method \App\Model\Entity\Type newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Type[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Type get($primaryKey, $options = [])
 * @method \App\Model\Entity\Type findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Type patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Type[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Type|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Type saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TypeTable extends Table
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

        $this->setTable('type');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }
    public function getAll($condition = [], $contain = [])
    {
        $result = $this->find('all')->where($condition)->contain($contain);
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    public function getOneById($condition = [], $contain = [])
    {
        $result = $this->find('all')->where($condition)->contain($contain)->first();
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }
    public function createType($data = [], $createdBy = null)
    {
        $newType = $this->newEmptyEntity($data);
        $newType->name = $data['name'];
        $newType->description = $data['description'];
        $newType->created_by = $createdBy;
        if ($this->save($newType)) {
            return true;
        } else return false;
    }
    public function deleteType($id = null)
    {
        $newType = $this->getOneById(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        $newType->del_flag = DEL_FLAG;
        $newType->active = INACTIVE;
        if (!empty($newType)) {
            if ($this->save($newType)) {
                return true;
            } else return false;
        } else false;
    }
    public function editType($id = null, $data = [], $updatedBy = null)
    {
        $newType = $this->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        $newType->name = $data['name'];
        $newType->description = $data['description'];
        $newType->updated_by = $updatedBy;
        if (!empty($newType)) {
            if ($this->save($newType)) {
                return true;
            } else return false;
        } else false;
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
            ->notEmptyString('active');

        $validator
            ->notEmptyString('del_flag');

        return $validator;
    }
}
