//src/Controller/CompanysController
namespace App\Controller
class CompanysController extends AppController{
    public $components = ['Flash'];
    public function index()
    {
         $this->set('companys', $this->Companys->find('all'));
    }

    public function view($id = null)
    {
        $company = $this->Companys->get($id);
        $this->set(compact('company'));
    }
    public function add()
    {
        $company = $this -> Companys->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companys->patchEntity($company, $this->request->getData());
            $company->user_id = $this->Auth->user('id');
            if ($this->Companys->save($company)) {
                $this->Flash->success(__('Your company has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your company.'));
        }
        $this->set('company', $company);
    }

    public function edit($id = null)
    {
    $company = $this->Companys->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->Companys->patchEntity($company, $this->request->getData());
        if ($this->Companys->save($company)) {
            $this->Flash->success(__('The company data has been modified.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The company could not be modified.'));
    }

    $this->set('company', $company);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $company = $this->Companys->get($id);
        if ($this->Companys->delete($company)) {
            $this->Flash->success(__('Company with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
        //all registered users can create a company
        if($this->request->getParam('action') === 'add'){
            return true;
        }

        if(in_array($this->request->getParam('action'), ['edit', 'delete'])){
            $companyId = (int)$this->request->getParam('pass.0');
            if ($this->Companys->isOwnedBy($companyId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}