<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecyDmfSmfDistrictsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecyDmfSmfDistrictsTable Test Case
 */
class SecyDmfSmfDistrictsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecyDmfSmfDistrictsTable
     */
    public $SecyDmfSmfDistricts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SecyDmfSmfDistricts',
        'app.Months',
        'app.Years',
        'app.Items',
        'app.FormCodes',
        'app.MappedForms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SecyDmfSmfDistricts') ? [] : ['className' => SecyDmfSmfDistrictsTable::class];
        $this->SecyDmfSmfDistricts = TableRegistry::getTableLocator()->get('SecyDmfSmfDistricts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SecyDmfSmfDistricts);

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
