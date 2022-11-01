<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Type Controller
 *
 * @property \App\Model\Table\TypeTable $Type
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->m_type = $this->fetchTable('Type');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $types = $this->m_type->getAll()->toArray();

        $this->set(compact('types'));
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Type->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('type'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Type->newEmptyEntity();
        if ($this->request->is('post')) {
            $type = $this->Type->patchEntity($type, $this->request->getData());
            if ($this->Type->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Type->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Type->patchEntity($type, $this->request->getData());
            if ($this->Type->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Type->get($id);
        if ($this->Type->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
