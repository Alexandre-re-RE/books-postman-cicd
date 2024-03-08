<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livres Model
 *
 * @property \App\Model\Table\LivreAuteurTable&\Cake\ORM\Association\HasMany $LivreAuteur
 *
 * @method \App\Model\Entity\Livre newEmptyEntity()
 * @method \App\Model\Entity\Livre newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Livre> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livre get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Livre findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Livre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Livre> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livre|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Livre saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Livre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Livre>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Livre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Livre> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Livre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Livre>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Livre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Livre> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LivresTable extends Table
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

        $this->setTable('livres');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('id');

        $this->hasMany('LivreAuteur', [
            'foreignKey' => 'livre_id',
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
            ->scalar('titre')
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        return $validator;
    }
}
