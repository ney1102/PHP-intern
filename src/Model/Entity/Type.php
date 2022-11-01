<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Type Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_on
 * @property int|null $updated_by
 * @property int $active
 * @property int $del_flag
 */
class Type extends Entity
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
        'name' => true,
        'description' => true,
        'created_on' => true,
        'created_by' => true,
        'updated_on' => true,
        'updated_by' => true,
        'active' => true,
        'del_flag' => true,
    ];
}
