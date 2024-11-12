<?php
namespace App\Modules\Character\Application\Repositories\Eloquent;

use App\Modules\Character\Domain\Repository\CharacterRepositoryInterface;
use App\Modules\Character\Infrastructure\EloquentModels\Character;

class CharacterRepository implements CharacterRepositoryInterface
{
    public function findAll(): array
    {
        $characters = [];
        foreach (Character::all() as $characterEloquent) {
            $characters[] = characterMapper::fromEloquent($characterEloquent);
        }
        return $characters;
    }

    public function findById(string $characterId): Character
    {
        $characterEloquent = Character::query()->findOrFail($characterId);
        return characterMapper::fromEloquent($characterEloquent);
    }

    public function store(Character $character): Character
    {
        $characterEloquent = characterMapper::toEloquent($character);
        $characterEloquent->password = $password->value;
        $characterEloquent->save();

        return characterMapper::fromEloquent($characterEloquent);
    }

    public function update(character $character, Password $password): void
    {
        $characterEloquent = characterMapper::toEloquent($character);
        if ($password->isNotEmpty()) {
            $characterEloquent->password = $password->value;
        }
        $characterEloquent->save();
    }

    public function delete(int $character_id): void
    {
        $characterEloquent = characterEloquentModel::query()->findOrFail($character_id);
        $characterEloquent->delete();
    }
}
