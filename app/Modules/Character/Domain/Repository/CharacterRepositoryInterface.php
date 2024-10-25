<?php

namespace App\Modules\Character\Domain\Repository;

use App\Modules\Character\Domain\Model\Character;

interface CharacterRepositoryInterface
{
    public function add(Character $character): void;

    public function get(CharacterId $characterId): Character;

    public function update(Character $character): void;
}