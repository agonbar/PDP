<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequisitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequisitesTable Test Case
 */
class RequisitesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequisitesTable
     */
    public $Requisites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requisites',
        'app.risks',
        'app.companys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Requisites') ? [] : ['className' => RequisitesTable::class];
        $this->Requisites = TableRegistry::get('Requisites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requisites);

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
