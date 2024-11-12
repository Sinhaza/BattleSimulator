<?php

namespace App\Modules\Character\Domain\Repository;

use App\Modules\Character\Domain\Model\Character;

interface CharacterRepositoryInterface
{
    public function findAll(): array;

    public function findById(string $characterId): Character;

    public function store(Character $character): Character;

    public function update(Character $character): void;

    public function delete(string $characterId): void;
}