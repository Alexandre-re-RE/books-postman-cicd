<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LivreAuteur Entity
 *
 * @property int $livre_id
 * @property int $auteur_id
 *
 * @property \App\Model\Entity\Livre $livre
 * @property \App\Model\Entity\Auteur $auteur
 */
class LivreAuteur extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'livre' => true,
        'auteur' => true,
    ];
}
