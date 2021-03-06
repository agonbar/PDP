<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $nombre
 * @property string $password
 * @property string $apellidos
 * @property \Cake\I18n\FrozenTime $createdAt
 * @property \Cake\I18n\FrozenTime $updatedAt
 * @property int $enabled
 * @property int $asesor
 *
 * @property \App\Model\Entity\Company[] $companys
 * @property \App\Model\Entity\Industry[] $industry
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'nombre' => true,
        'password' => true,
        'apellidos' => true,
        'createdAt' => true,
        'updatedAt' => true,
        'enabled' => true,
        'asesor' => true,
        'companys' => true,
        'industry' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
