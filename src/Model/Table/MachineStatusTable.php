<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MachineStatus Model
 *
 * @property \App\Model\Table\AssignTable&\Cake\ORM\Association\HasMany $Assign
 * @property \App\Model\Table\DeviceTable&\Cake\ORM\Association\HasMany $Device
 * @property \App\Model\Table\HistoryTable&\Cake\ORM\Association\HasMany $History
 *
 * @method \App\Model\Entity\MachineStatus newEmptyEntity()
 * @method \App\Model\Entity\MachineStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MachineStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MachineStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MachineStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MachineStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MachineStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MachineStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MachineStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MachineStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MachineStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MachineStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MachineStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MachineStatusTable extends Table
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

        $this->setTable('machine_status');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Assign', [
            'foreignKey' => 'machine_status_id',
        ]);
        $this->hasMany('Device', [
            'foreignKey' => 'machine_status_id',
        ]);
        $this->hasMany('History', [
            'foreignKey' => 'machine_status_id',
        ]);
    }
    public function getOne($condition = [], $contain = [])
    {
        $ms = $this->find()->where($condition)->contain($contain)->first();
        if (!empty($ms)) {
            return $ms;
        }
        return null;
    }
    public function getListMS($condition = [], $contain = [])
    {
        $listMs = $this->find()->where($condition)->contain($contain);
        if (!empty($listMs)) {
            return $listMs;
        } else return null;
    }
    public function addMachineStatus($data = [], $createdBy = null)
    {
        $mS = $this->newEmptyEntity();
        $mS->title = $data['title'];
        $mS->created_by = $createdBy;
        if ($this->save($mS)) {
            return true;
        } else return false;
    }
    public function editMachineStatus($id = null, $data = [], $updatedBy = null)
    {
        $mS = $this->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        if (!empty($mS)) {
            $mS->title = $data['title'];
            $mS->updated_by = $updatedBy;
            if ($this->save($mS)) {
                return true;
            } else return false;
        } else return false;
    }
    public function deleteMachineStatus($id = null, $updatedBy = null)
    {
        $mS = $this->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        if (!empty($mS)) {
            $mS->del_flag = DEL_FLAG;
            $mS->updated_by = $updatedBy;
            if ($this->save($mS)) {
                return true;
            } else return false;
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
            ->scalar('title')
            ->maxLength('title', 250)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
