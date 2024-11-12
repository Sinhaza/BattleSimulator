<?php

namespace App\Modules\Character\Infrastructure\EloquentModels;

use App\Modules\Character\Domain\Model\Attributes;
use App\Modules\Character\Domain\Model\CharacterType;
use App\Traits\ThrowsDice;


class Character
{
    use ThrowsDice;

    /**
     * @var string
     */
    private $name;

    /**
     * @var CharacterType
     */
    private $type;

    /**
     * @var int
     */
    private $level;

    /**
     * @var int
     */
    private $raceId;

    /**
     * @var Attributes
     */
    private $attributes;

    /**
     * @var HitPoints
     */
    private $hitPoints;

    /**
     * @var Statistics
     */
    private $statistics;

    /**
     * @var Inventory
     */
    private $inventory;


    protected $guarded = [];


    public function createAttributes()
    {
        $this->attributes = new Attributes([
            'strength' => $this->ThrowAbilityScore(),
            'dexterity' => $this->ThrowAbilityScore(),
            'constitution' => $this->ThrowAbilityScore(),
            'intelligence' => $this->ThrowAbilityScore(),
            'charisma' => $this->ThrowAbilityScore(),
            'unassigned' => 0,
        ]);
    }

    public function isPlayerCharacter(): bool
    {
        return $this->type === CharacterType::PLAYER;
    }

    public function isMonster(): bool
    {
        return $this->type === CharacterType::MONSTER;
    }

    public function getLevelNumber(): int
    {
        return $this->level_id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isAlive(): bool
    {
        return $this->hit_points > 0;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDexterity(): int
    {
        return $this->attributes->getDexterity();
    }

    public function getConstitution(): int
    {
        return $this->attributes->getConstitution();
    }

    public function getIntelligence(): int
    {
        return $this->attributes->getIntelligence();
    }

    public function getCharisma(): int
    {
        return $this->attributes->getCharisma();
    }


    public function getHitPoints(): int
    {
        return $this->attributes->getConstitution();
    }

    public function getTotalHitPoints(): int
    {
        return $this->total_hit_points;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }


    public function getXp(): int
    {
        return $this->xp;
    }

    public function getAvailableAttributePoints(): int
    {
        return $this->available_attribute_points;
    }
}