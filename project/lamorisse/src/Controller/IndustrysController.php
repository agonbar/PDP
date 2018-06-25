//src/Controller/IndustrysController
namespace App\Controller
class IndustrysController extends AppController{
    public $components = ['Flash'];
    public function index()
    {
         $this->set('industrys', $this->Industrys->find('all'));
    }

    public function view($id = null)
    {
        $industry = $this->Industrys->get($id);
        $this->set(compact('industry'));
    }
    public function add()
    {
        $industry = $this -> Industrys->newEntity();
        if ($this->request->is('post')) {
            $industry = $this->Industrys->patchEntity($industry, $this->request->getData());
            $industry->user_id = $this->Auth->user('id');
            if ($this->Industrys->save($industry)) {
                $this->Flash->success(__('Your industry has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your industry.'));
        }
        $this->set('industry', $industry);
    }

    public function edit($id = null)
    {
    $industry = $this->Industrys->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->Industrys->patchEntity($industry, $this->request->getData());
        if ($this->Industrys->save($industry)) {
            $this->Flash->success(__('The industry data has been modified.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The industry could not be modified.'));
    }

    $this->set('industry', $industry);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $industry = $this->Industrys->get($id);
        if ($this->Industrys->delete($industry)) {
            $this->Flash->success(__('industry with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
        //all registered users who are asesor can create a industry
        if($user("asesor") === true){
            if($this->request->getParam('action') === 'add'){
                return true;
            }

            if(in_array($this->request->getParam('action'), ['edit', 'delete'])){
                $industryId = (int)$this->request->getParam('pass.0');
                if ($this->Industrys->isOwnedBy($industryId, $user['id'])) {
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }
}