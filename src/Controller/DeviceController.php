<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Device Controller
 *
 * @property \App\Model\Table\DeviceTable $Device
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeviceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Suppliers'],
        ];
        $device = $this->paginate($this->Device);

        $this->set(compact('device'));
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
        $device = $this->Device->get($id, [
            'contain' => ['Suppliers', 'Assign', 'AttachedImage', 'History'],
        ]);

        $this->set(compact('device'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $device = $this->Device->newEmptyEntity();
        if ($this->request->is('post')) {
            $device = $this->Device->patchEntity($device, $this->request->getData());
            if ($this->Device->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $suppliers = $this->Device->Suppliers->find('list', ['limit' => 200])->all();
        $this->set(compact('device', 'suppliers'));
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
        $device = $this->Device->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $device = $this->Device->patchEntity($device, $this->request->getData());
            if ($this->Device->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

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
        if ($this->Device->delete($device)) {
            $this->Flash->success(__('The device has been deleted.'));
        } else {
            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
