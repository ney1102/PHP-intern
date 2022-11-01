<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property int $id
 * @property string $serial
 * @property string $name
 * @property string $code
 * @property string $property_type
 * @property int $device_type
 * @property int $supplier_id
 * @property string $model
 * @property int $price
 * @property \Cake\I18n\FrozenTime $created_buy
 * @property int|null $warranty_time
 * @property int $machine_status_id
 * @property string|null $description
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_on
 * @property int|null $updated_by
 * @property bool $del_flag
 * @property bool $active
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Assign[] $assign
 * @property \App\Model\Entity\AttachedImage[] $attached_image
 * @property \App\Model\Entity\History[] $history
 */
class Device extends Entity
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
        'serial' => true,
        'name' => true,
        'code' => true,
        'property_type' => true,
        'device_type' => true,
        'supplier_id' => true,
        'model' => true,
        'price' => true,
        'created_buy' => true,
        'warranty_time' => true,
        'machine_status_id' => true,
        'description' => true,
        'status' => true,
        'created_on' => true,
        'created_by' => true,
        'updated_on' => true,
        'updated_by' => true,
        'del_flag' => true,
        'active' => true,
        'supplier' => true,
        'assign' => true,
        'attached_image' => true,
        'history' => true,
    ];
}
