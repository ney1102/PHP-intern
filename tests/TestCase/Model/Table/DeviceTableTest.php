<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeviceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeviceTable Test Case
 */
class DeviceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeviceTable
     */
    protected $Device;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Device',
        'app.Suppliers',
        'app.Assign',
        'app.AttachedImage',
        'app.History',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Device') ? [] : ['className' => DeviceTable::class];
        $this->Device = $this->getTableLocator()->get('Device', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Device);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DeviceTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DeviceTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
