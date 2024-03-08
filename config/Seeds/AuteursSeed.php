<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Auteurs seed.
 */
class AuteursSeed extends AbstractSeed
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
        $data = [
            [
                "id" => 1,
                "nom" => "Alexandre", 
            ],
            [
                "id" => 2,
                "nom" => "Thomas",
            ],
            [
                "id" => 3,
                "nom" => "Loic",
            ],
        ];

        $table = $this->table('auteurs');
        $table->insert($data)->save();
    }
}
