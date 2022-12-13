<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MachineStatusFixture
 */
class MachineStatusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'machine_status';
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
                'title' => 'Lorem ipsum dolor sit amet',
                'created_on' => 1667373006,
                'created_by' => 1,
                'updated_on' => 1667373006,
                'updated_by' => 1,
                'active' => 1,
                'del_flag' => 1,
            ],
        ];
        parent::init();
    }
}
