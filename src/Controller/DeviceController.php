<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\DeviceTable;
use App\Model\Table\TypeTable;

/**
 * Device Controller
 *
 * @property \App\Model\Table\DeviceTable $m_device
 * @property \App\Model\Table\SuppliersTable $m_supplier
 * @property \App\Model\Table\MachineStatusTable $m_machineStatus
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeviceController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->m_machineStatus = $this->fetchTable('MachineStatus');
        // $this->m_device = $this->fetchTable('Device');
        $this->m_device = new DeviceTable();
        $this->m_supplier = $this->fetchTable('Suppliers');
        $this->m_type = $this->fetchTable('Type');
        $this->m_type2 = new TypeTable();
        // dd($this->m_type2);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Suppliers', 'Type'],
        // ];
        // $devices = $this->paginate($this->m_device);
        $devices = $this->m_device->getAll(['Type'])->toList();
        // dd($devices);
        $this->set(compact('devices'));
    }

    /**
     * View method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $devices = $this->m_device->get($id, [
            'contain' => ['Suppliers', 'Assign', 'AttachedImage', 'History', 'MachineSatatus'],
        ]);

        $this->set(compact('devices'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listSuppliers = $this->m_supplier->getAll(['del_flag' => UNDEL, 'active' => ACTIVE], []);
        $listMachineStatus = $this->m_machineStatus->getListMS(['del_flag' => UNDEL, 'active' => ACTIVE], [])->select()->toList();
        $listType = $this->m_type->getAll(['del_flag' => UNDEL, 'active' => ACTIVE], [])->toList();
        $this->set('listSuppliers', $listSuppliers);
        $this->set('listMachineStatus', $listMachineStatus);
        $this->set('listType', $listType);
        // debug($listSuppliers);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            dd($this->request->getData());

            $this->set('dataRequest', $data);
            $createdBy = ACTIVE;
            if ($this->m_device->addDevice($data, $createdBy,$data['code'])) {
                $this->Flash->success(__('The device "' . $data['name'] . '" has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $device = $this->m_device->getOne($id);
        // dd($device);
        $listSuppliers = $this->m_supplier->getAll(['del_flag' => UNDEL, 'active' => ACTIVE], []);
        $listMachineStatus = $this->m_machineStatus->getListMS(['del_flag' => UNDEL, 'active' => ACTIVE]);
        $listType = $this->m_type->getAll(['del_flag' => UNDEL, 'active' => ACTIVE], [])->toList();
        $this->set('listSuppliers', $listSuppliers);
        $this->set('listMachineStatus', $listMachineStatus);
        $this->set('listType', $listType);
        $this->set('device', $device);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $device = $this->Device->patchEntity($device, $this->request->getData());
            $data = $this->request->getData();

            // dd($data['images']);
            $updated_by = ACTIVE;
            if ($this->m_device->editDevice($device->id,$data,$data['code'],ACTIVE)) {
                $this->Flash->success(__('The device "' . $device->name . '" has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $suppliers = $this->Device->Suppliers->find('list', ['limit' => 200])->all();
        $this->set(compact('device', 'suppliers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $device = $this->Device->get($id);
        if ($this->m_device->edit($device)) {
            $this->Flash->success(__('The device "' . $device->name . '" has been deleted.'));
        } else {
            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function autoFillDeviceCodeWhileCreate()
    {
        // dd(1);
        if (!empty($_POST['device_type']) && !empty($_POST['supplier'])) {
            $device_type = $_POST['device_type'];
            $supplier = $_POST['supplier'];
            $code = $this->m_device->getCombineCodeWhileCreate($device_type, $supplier);
            $status_code = 200;
            return $this->response->withType('application/json')
                ->withStatus($status_code)
                ->withStringBody(json_encode(['code' => $code]));
        }
        $code = '';
        $status_code = 200;
        return $this->response->withType('application/json')
            ->withStatus($status_code)
            ->withStringBody(json_encode(['code' => $code]));
    }
    public function autoFillDeviceCodeWhileEdit()
    {
        // dd(1);
        if (!empty($_POST['device_type']) && !empty($_POST['supplier'])) {
            $device_type = $_POST['device_type'];
            $supplier = $_POST['supplier'];
            $device_id = $_POST['device_id'];
            $code = $this->m_device->getCombineCodeWhileEdit($device_id, $device_type, $supplier);
            // dd($code);
            $status_code = 200;
            return $this->response->withType('application/json')
                ->withStatus($status_code)
                ->withStringBody(json_encode(['code' => $code]));
        }
        $code = '';
        $status_code = 200;
        return $this->response->withType('application/json')
            ->withStatus($status_code)
            ->withStringBody(json_encode(['code' => $code]));
    }
}
