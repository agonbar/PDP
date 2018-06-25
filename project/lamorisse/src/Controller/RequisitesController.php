<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisites Controller
 *
 * @property \App\Model\Table\RequisitesTable $Requisites
 *
 * @method \App\Model\Entity\Requisite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequisitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Risks']
        ];
        $requisites = $this->paginate($this->Requisites);

        $this->set(compact('requisites'));
    }

    /**
     * View method
     *
     * @param string|null $id Requisite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requisite = $this->Requisites->get($id, [
            'contain' => ['Risks', 'Companys']
        ]);

        $this->set('requisite', $requisite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requisite = $this->Requisites->newEntity();
        if ($this->request->is('post')) {
            $requisite = $this->Requisites->patchEntity($requisite, $this->request->getData());
            if ($this->Requisites->save($requisite)) {
                $this->Flash->success(__('The requisite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisite could not be saved. Please, try again.'));
        }
        $risks = $this->Requisites->Risks->find('list', ['limit' => 200]);
        $companys = $this->Requisites->Companys->find('list', ['limit' => 200]);
        $this->set(compact('requisite', 'risks', 'companys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requisite = $this->Requisites->get($id, [
            'contain' => ['Companys']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisite = $this->Requisites->patchEntity($requisite, $this->request->getData());
            if ($this->Requisites->save($requisite)) {
                $this->Flash->success(__('The requisite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisite could not be saved. Please, try again.'));
        }
        $risks = $this->Requisites->Risks->find('list', ['limit' => 200]);
        $companys = $this->Requisites->Companys->find('list', ['limit' => 200]);
        $this->set(compact('requisite', 'risks', 'companys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requisite = $this->Requisites->get($id);
        if ($this->Requisites->delete($requisite)) {
            $this->Flash->success(__('The requisite has been deleted.'));
        } else {
            $this->Flash->error(__('The requisite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
