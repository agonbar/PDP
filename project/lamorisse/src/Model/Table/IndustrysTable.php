namespace App\Model\Table;

use Cake\ORM\Table;

class IndustrysTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('nombre')
            ->notEmpty('descripcion');

        return $validator;
    }
    public function isOwnedBy($indsutryId, $userId)
{
    return $this->exists(['id' => $indsutryId, 'user_id' => $userId]);
}
}