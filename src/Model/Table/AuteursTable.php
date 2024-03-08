<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Auteurs Model
 *
 * @property \App\Model\Table\LivreAuteurTable&\Cake\ORM\Association\HasMany $LivreAuteur
 *
 * @method \App\Model\Entity\Auteur newEmptyEntity()
 * @method \App\Model\Entity\Auteur newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Auteur> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Auteur get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Auteur findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Auteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Auteur> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Auteur|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Auteur saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Auteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Auteur>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Auteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Auteur> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Auteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Auteur>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Auteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Auteur> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AuteursTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('auteurs');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->hasMany('LivreAuteur', [
            'foreignKey' => 'auteur_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        return $validator;
    }
}
