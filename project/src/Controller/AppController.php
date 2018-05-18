// In src/Controller/AppController.php
namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize()
    {
        // Existing code

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            // Added this line
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our pages controller
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index']);
    }
    public function isAuthorized($user)
    {
        // By default deny access.
        return false;
    }
}