<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companys Controller
 *
 * @property \App\Model\Table\CompanysTable $Companys
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompanysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $companys = $this->paginate($this->Companys);

        $this->set(compact('companys'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companys->get($id, [
            'contain' => ['Users', 'Requisites']
        ]);

        $this->set('company', $company);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companys->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companys->patchEntity($company, $this->request->getData());
            if ($this->Companys->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $users = $this->Companys->Users->find('list', ['limit' => 200]);
        $requisites = $this->Companys->Requisites->find('list', ['limit' => 200]);
        $this->set(compact('company', 'users', 'requisites'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companys->get($id, [
            'contain' => ['Requisites']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companys->patchEntity($company, $this->request->getData());
            if ($this->Companys->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $users = $this->Companys->Users->find('list', ['limit' => 200]);
        $requisites = $this->Companys->Requisites->find('list', ['limit' => 200]);
        $this->set(compact('company', 'users', 'requisites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companys->get($id);
        if ($this->Companys->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
