<?php

namespace App\Modules\Character\Application\Interfaces;

use App\Modules\Character\Domain\Character;

interface CharacterRepositoryInterface
{
    public function add(Character $character): void;

    public function get(CharacterId $characterId): Character;

    public function update(Character $character): void;
}