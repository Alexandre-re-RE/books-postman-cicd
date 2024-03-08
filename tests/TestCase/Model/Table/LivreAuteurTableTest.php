<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivreAuteurTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivreAuteurTable Test Case
 */
class LivreAuteurTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivreAuteurTable
     */
    protected $LivreAuteur;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.LivreAuteur',
        'app.Livres',
        'app.Auteurs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LivreAuteur') ? [] : ['className' => LivreAuteurTable::class];
        $this->LivreAuteur = $this->getTableLocator()->get('LivreAuteur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LivreAuteur);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LivreAuteurTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
