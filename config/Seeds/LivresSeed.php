<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Livres seed.
 */
class LivresSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $this->call('AuteursSeed');

        $data = [
            [
                "id" => 1,
                "titre" => "le verre",
            ],
            [
                "id" => 2,
                "titre" => "Le lampadaire",
            ],
            [
                "id" => 3,
                "titre" => "la souris",
            ],
        ];

        $table = $this->table('livres');
        $table->insert($data)->save();
    }
}
