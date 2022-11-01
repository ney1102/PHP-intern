<?php

declare(strict_types=1);

namespace App\Controller;

use Migrations\Command\Phinx\Dump;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuppliersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->m_supplier = $this->fetchTable('Suppliers');
        // $this->m_device = $this->fetchTable('Device');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $suppliers = $this->m_supplier->getAll(['del_flag' => UNDEL, 'active' => ACTIVE], [])->order(['id' => 'DESC'])->toList();
        // dd(($supplier));
        $this->set(compact('suppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->m_supplier->getAll(['del_flag' => UNDEL, 'active' => ACTIVE, 'id' => $id])->first();
        $this->set(compact('supplier'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // dump($data);
            $supplier = $this->m_supplier->patchEntity($supplier, $data);
            $createBy = 1;
            if ($this->m_supplier->createSupplier($supplier, 1)) {
                $this->Flash->success(__('The supplier has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->m_supplier->getOne($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $supplier = $this->m_supplier->patchEntity($supplier, $data);
            $updatedBy = ACTIVE;
            if ($this->m_supplier->editSupplier($supplier->id, $data, $updatedBy)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        if ($this->m_supplier->deleteSupplier($id)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
