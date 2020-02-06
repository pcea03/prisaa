<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SwimmerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SwimmerTable Test Case
 */
class SwimmerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SwimmerTable
     */
    public $Swimmer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Swimmer',
        'app.Events',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Swimmer') ? [] : ['className' => SwimmerTable::class];
        $this->Swimmer = TableRegistry::getTableLocator()->get('Swimmer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Swimmer);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
