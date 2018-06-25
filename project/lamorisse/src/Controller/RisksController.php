<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Risks Controller
 *
 * @property \App\Model\Table\RisksTable $Risks
 *
 * @method \App\Model\Entity\Risk[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RisksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Industry', 'Type']
        ];
        $risks = $this->paginate($this->Risks);

        $this->set(compact('risks'));
    }

    /**
     * View method
     *
     * @param string|null $id Risk id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $risk = $this->Risks->get($id, [
            'contain' => ['Industry', 'Type']
        ]);

        $this->set('risk', $risk);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $risk = $this->Risks->newEntity();
        if ($this->request->is('post')) {
            $risk = $this->Risks->patchEntity($risk, $this->request->getData());
            if ($this->Risks->save($risk)) {
                $this->Flash->success(__('The risk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risk could not be saved. Please, try again.'));
        }
        $industry = $this->Risks->Industry->find('list', ['limit' => 200]);
        $type = $this->Risks->Type->find('list', ['limit' => 200]);
        $this->set(compact('risk', 'industry', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Risk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $risk = $this->Risks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $risk = $this->Risks->patchEntity($risk, $this->request->getData());
            if ($this->Risks->save($risk)) {
                $this->Flash->success(__('The risk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risk could not be saved. Please, try again.'));
        }
        $industry = $this->Risks->Industry->find('list', ['limit' => 200]);
        $type = $this->Risks->Type->find('list', ['limit' => 200]);
        $this->set(compact('risk', 'industry', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Risk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $risk = $this->Risks->get($id);
        if ($this->Risks->delete($risk)) {
            $this->Flash->success(__('The risk has been deleted.'));
        } else {
            $this->Flash->error(__('The risk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
