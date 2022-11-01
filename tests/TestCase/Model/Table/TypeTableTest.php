<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeTable Test Case
 */
class TypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeTable
     */
    protected $Type;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Type',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Type') ? [] : ['className' => TypeTable::class];
        $this->Type = $this->getTableLocator()->get('Type', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Type);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
