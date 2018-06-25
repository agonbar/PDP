<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Risk Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $description
 * @property bool $Criticalidad
 * @property int $industry_id
 * @property int $type_id
 *
 * @property \App\Model\Entity\Industry $industry
 * @property \App\Model\Entity\Type $type
 */
class Risk extends Entity
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
        'nombre' => true,
        'description' => true,
        'Criticalidad' => true,
        'industry_id' => true,
        'type_id' => true,
        'industry' => true,
        'type' => true
    ];
}
