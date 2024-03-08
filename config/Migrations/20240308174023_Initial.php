<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('auteurs')
            ->addColumn('nom', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('livre_auteur', ['id' => false, 'primary_key' => ['livre_id', 'auteur_id']])
            ->addColumn('livre_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('auteur_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->create();

        $this->table('livres')
            ->addColumn('titre', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('auteurs')->drop()->save();
        $this->table('livre_auteur')->drop()->save();
        $this->table('livres')->drop()->save();
    }
}
