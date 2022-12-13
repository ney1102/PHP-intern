<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * MachineStatus Controller
 *
 * @method \App\Model\Entity\MachineStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MachineStatusController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->m_machineStatus = $this->fetchTable('MachineStatus');
        $this->m_device = $this->fetchTable('Device');
        // $this->m_device = $this->fetchTable('Device');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $machineStatuses = $this->m_machineStatus->getListMS(['del_flag' => UNDEL, 'active' => ACTIVE])->toList();

        $this->set(compact('machineStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Machine Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machineStatus = $this->MachineStatus->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('machineStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machineStatus = $this->MachineStatus->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $machineStatus = $this->MachineStatus->patchEntity($machineStatus, $data);
            if ($this->MachineStatus->addMachineStatus($machineStatus, ACTIVE)) {
                $this->Flash->success(__('The machine status has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine status could not be saved. Please, try again.'));
        }
        $this->set(compact('machineStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machineStatus = $this->m_machineStatus->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataInput = $this->request->getData();
            $machineStatus = $this->m_machineStatus->patchEntity($machineStatus, $dataInput);
            $updatedBy = ACTIVE; //temp....
            if ($this->m_machineStatus->editMachineStatus($id, $machineStatus, $updatedBy)) {
                $this->Flash->success(__('The machine status ."  has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine status could not be saved. Please, try again.'));
        }
        $this->set(compact('machineStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        // $machineStatus = $this->m_machineStatus->getOne(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => 'id']);
        if ($this->m_machineStatus->deleteMachineStatus($id, ACTIVE)) {
            $this->Flash->success(__('The machine status has been deleted.'));
        } else {
            $this->Flash->error(__('The machine status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
