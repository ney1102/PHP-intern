<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachineStatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachineStatusTable Test Case
 */
class MachineStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MachineStatusTable
     */
    protected $MachineStatus;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MachineStatus',
        'app.Assign',
        'app.Device',
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
        $config = $this->getTableLocator()->exists('MachineStatus') ? [] : ['className' => MachineStatusTable::class];
        $this->MachineStatus = $this->getTableLocator()->get('MachineStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MachineStatus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MachineStatusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
