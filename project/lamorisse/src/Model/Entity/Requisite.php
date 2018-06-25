<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requisite Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $description
 * @property int $risks_id
 *
 * @property \App\Model\Entity\Risk $risk
 * @property \App\Model\Entity\Company[] $companys
 */
class Requisite extends Entity
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
        'risks_id' => true,
        'risk' => true,
        'companys' => true
    ];
}
