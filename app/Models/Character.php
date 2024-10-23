<?php

namespace App\Models;

use App\Modules\Character\Domain\Attributes;
use App\Modules\Character\Domain\CharacterType;
use App\Modules\Equipment\Domain\ItemStatus;
use App\Modules\Equipment\Domain\ItemType;
use App\Traits\ThrowsDice;
use App\Traits\UsesStringId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string id
 * @property integer hit_points
 * @property integer xp
 * @property integer available_attribute_points
 * @property integer battles_won
 * @property integer battles_lost
 * @property integer strength
 * @property integer dexterity
 * @property integer constitution
 * @property integer intelligence
 * @property integer charisma
 * @property string location_id
 * @property string gender
 * @property string type
 * @property string name
 * @property int level_id
 * @property Inventory inventory
 * @property Store store
 * @property integer reputation
 */
class Character extends Model
{

    use ThrowsDice;

    private Attributes $attributes;

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

    public function isMerchant(): bool
    {
        return $this->type === CharacterType::MERCHANT;
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