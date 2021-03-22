<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecyDmfSmfBlocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecyDmfSmfBlocksTable Test Case
 */
class SecyDmfSmfBlocksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecyDmfSmfBlocksTable
     */
    public $SecyDmfSmfBlocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SecyDmfSmfBlocks',
        'app.Months',
        'app.Years',
        'app.FormCodes',
        'app.MappedForms',
        'app.Items',
        'app.CardTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SecyDmfSmfBlocks') ? [] : ['className' => SecyDmfSmfBlocksTable::class];
        $this->SecyDmfSmfBlocks = TableRegistry::getTableLocator()->get('SecyDmfSmfBlocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SecyDmfSmfBlocks);

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
