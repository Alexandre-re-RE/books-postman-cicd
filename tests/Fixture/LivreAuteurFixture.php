<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivreAuteurFixture
 */
class LivreAuteurFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'livre_auteur';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'livre_id' => 1,
                'auteur_id' => 1,
            ],
        ];
        parent::init();
    }
}
