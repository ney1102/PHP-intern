<?php

declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Type;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Migrations\Command\Phinx\Dump;

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
        $this->m_type = new TypeTable();
        $this->m_suppliers = new SuppliersTable();
        $this->setTable('device');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Type', [
            'foreignKey' => 'device_type'
        ]);
        $this->belongsTo('Type', ['foreignKey' => 'device_type'])
            ->setConditions([['Type.del_flag' => UNDEL, 'Type.active' => ACTIVE]]);

        $this->belongsTo('Suppliers', ['foreignKey' => 'supplier_id', 'joinType' => 'left',])
            ->setConditions(['Suppliers.del_flag' => UNDEL, 'Suppliers.active' => ACTIVE]);

        $this->belongsTo('MachineStatus', ['foreginKey' => 'machine_status_id'])
            ->setConditions(['MachineStatus.del_flag' => UNDEL, 'MachineStatus.active' => ACTIVE]);

        $this->hasMany('Assign', ['foreignKey' => 'device_id',])
            ->setConditions(['Assign.del_flag' => UNDEL, 'Assign.active' => ACTIVE]);

        $this->hasMany('AttachedImage', [
            'foreignKey' => 'device_id',
        ]);

        $this->hasMany('History', ['foreignKey' => 'device_id',])
            ->setConditions(['History.del_flag' => UNDEL, 'History.active' => ACTIVE]);
    }
    public function getOne($id = null)
    {
        $device = $this->find()
            ->where([
                $this->getAlias() . '.del_flag' => UNDEL,
                $this->getAlias() . '.active' => ACTIVE,
                $this->getAlias() . '.id' => $id
            ])
            ->contain([
                'Suppliers',
                'Type',
                'MachineStatus'
            ])
            ->first();
        if (!empty($device)) {
            return $device;
        } else return false;
    }
    public function getAll($condittion = [])
    {
        $result = $this->find()->where([$this->getAlias() . '.del_flag' => UNDEL, $this->getAlias() . '.active' => ACTIVE])->contain($condittion);
        if (!empty($result)) {
            return $result;
        } else return false;
    }
    public function getCombineCodeWhileCreate($device_type_id = null, $supplier_id = null)
    {
        $device_type_name = $this->m_type->get($device_type_id)->name;
        $supllier_name = $this->m_suppliers->get($supplier_id)->name;
        $last_device_id = $this->find()->where()->last()->id + 1;
        $code = $device_type_name . '-' . $supllier_name . '-' . $last_device_id;
        return $code;
    }
    public function getCombineCodeWhileEdit($id = null, $device_type_id = null, $supplier_id = null)
    {
        $device_type_name = $this->m_type->get($device_type_id)->name;
        $supllier_name = $this->m_suppliers->get($supplier_id)->name;
        $device_id = $this->find()->select(['id'])->where(['id' => $id])->first();
        $code = $device_type_name . '-' . $supllier_name . '-' . $device_id->id;
        // dd($code);
        return $code;
    }

    public function addDevice($data = [], $createdBy = null, $device_code = null)
    {
        $device = $this->newEmptyEntity();
        $device->name = $data['name'];
        $device->serial = $data['serial'];
        $device->code = $device_code;
        $device->property_type = $data['property_type'];
        $device->price = $data['price'];
        $device->created_buy = $data['created_buy'];
        $device->model = $data['model'];
        $device->warranty_time = $data['warranty_time'];
        $device->device_type = $data['device_type'];
        $device->machine_status_id = $data['machine_status_id'];
        $device->supplier_id = $data['supplier_id'];
        $device->status = $data['status'];
        $device->description = $data['description'];
        $device->created_by = $createdBy;
        if ($this->save($device)) {
            return true;
        } else return false;
    }
    public function editDevice($id = null, $data = [], $device_code = null, $updated_by = null)
    {
        $device = $this->find()->where(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id])->first();
        $device->name = $data['name'];
        $device->serial = $data['serial'];
        $device->code = $device_code;
        $device->property_type = $data['property_type'];
        $device->price = $data['price'];
        $device->created_buy = $data['created_buy'];
        $device->model = $data['model'];
        $device->warranty_time = $data['warranty_time'];
        $device->device_type = $data['device_type'];
        $device->machine_status_id = $data['machine_status_id'];
        $device->supplier_id = $data['supplier_id'];
        $device->status = $data['status'];
        $device->description = $data['description'];
        $device->created_by = $updated_by;
        if ($this->save($device)) {
            return true;
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
