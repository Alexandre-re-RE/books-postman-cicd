<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivresTable Test Case
 */
class LivresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivresTable
     */
    protected $Livres;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Livres',
        'app.LivreAuteur',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Livres') ? [] : ['className' => LivresTable::class];
        $this->Livres = $this->getTableLocator()->get('Livres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Livres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LivresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
