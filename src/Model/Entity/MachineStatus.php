<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MachineStatus Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_on
 * @property int|null $updated_by
 * @property int $active
 * @property int $del_flag
 *
 * @property \App\Model\Entity\Assign[] $assign
 * @property \App\Model\Entity\Device[] $device
 * @property \App\Model\Entity\History[] $history
 */
class MachineStatus extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'created_on' => true,
        'created_by' => true,
        'updated_on' => true,
        'updated_by' => true,
        'active' => true,
        'del_flag' => true,
        'assign' => true,
        'device' => true,
        'history' => true,
    ];
}
