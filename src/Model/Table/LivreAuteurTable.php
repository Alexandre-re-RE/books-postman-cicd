<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LivreAuteur Model
 *
 * @property \App\Model\Table\LivresTable&\Cake\ORM\Association\BelongsTo $Livres
 * @property \App\Model\Table\AuteursTable&\Cake\ORM\Association\BelongsTo $Auteurs
 *
 * @method \App\Model\Entity\LivreAuteur newEmptyEntity()
 * @method \App\Model\Entity\LivreAuteur newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\LivreAuteur> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LivreAuteur get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\LivreAuteur findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\LivreAuteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\LivreAuteur> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LivreAuteur|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\LivreAuteur saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\LivreAuteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LivreAuteur>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LivreAuteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LivreAuteur> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LivreAuteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LivreAuteur>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LivreAuteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LivreAuteur> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LivreAuteurTable extends Table
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

        $this->setTable('livre_auteur');
        $this->setDisplayField(['livre_id', 'auteur_id']);
        $this->setPrimaryKey(['livre_id', 'auteur_id']);

        $this->belongsTo('Livres', [
            'foreignKey' => 'livre_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Auteurs', [
            'foreignKey' => 'auteur_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['livre_id'], 'Livres'), ['errorField' => 'livre_id']);
        $rules->add($rules->existsIn(['auteur_id'], 'Auteurs'), ['errorField' => 'auteur_id']);

        return $rules;
    }
}
