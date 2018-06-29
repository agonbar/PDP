<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisites Model
 *
 * @property \App\Model\Table\RisksTable|\Cake\ORM\Association\BelongsTo $Risks
 * @property \App\Model\Table\CompanysTable|\Cake\ORM\Association\BelongsToMany $Companys
 *
 * @method \App\Model\Entity\Requisite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requisite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requisite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requisite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisite|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requisite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requisite findOrCreate($search, callable $callback = null, $options = [])
 */
class RequisitesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('requisites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Risks', [
            'foreignKey' => 'risks_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Companys', [
            'foreignKey' => 'requisite_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'companys_requisites'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 45)
            ->allowEmpty('nombre');

        $validator
            ->scalar('description')
            ->maxLength('description', 45)
            ->allowEmpty('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['risks_id'], 'Risks'));

        return $rules;
    }
}
