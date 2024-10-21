<?php

namespace App\Factory;

use App\Entity\Etudiant;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Etudiant>
 */
final class EtudiantFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Etudiant::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'age' => self::faker()->randomNumber(),
            'cin' => self::faker()->realText(20),
            'email' => self::faker()->email(255),
            'nom' => self::faker()->lastName(255),
            'prenom' => self::faker()->firstName(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Etudiant $etudiant): void {})
        ;
    }
}
