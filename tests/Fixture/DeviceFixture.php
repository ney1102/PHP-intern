<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeviceFixture
 */
class DeviceFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'device';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'serial' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'property_type' => 'Lorem ipsum dolor sit amet',
                'device_type' => 1,
                'supplier_id' => 1,
                'model' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'created_buy' => 1666001224,
                'warranty_time' => 1,
                'machine_status_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'created_on' => 1666001224,
                'created_by' => 1,
                'updated_on' => 1666001224,
                'updated_by' => 1,
                'del_flag' => 1,
                'active' => 1,
            ],
        ];
        parent::init();
    }
}
