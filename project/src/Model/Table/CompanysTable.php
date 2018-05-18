namespace App\Model\Table;

use Cake\ORM\Table;

class CompanysTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('cif')
            ->notEmpty('nombre')
            ->notEmpty('descripcion');

        return $validator;
    }
    public function isOwnedBy($companyId, $userId)
{
    return $this->exists(['id' => $companyId, 'user_id' => $userId]);
}
}