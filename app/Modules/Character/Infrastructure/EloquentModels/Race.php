<?php

namespace App\Modules\Character\Infrastructure\EloquentModels;

use App\Modules\Character\Domain\Model\Attributes;

class Race
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Attributes
     */
    private $attributes;

    public function __construct(
        int $id,
        string $startingLocationId,
        string $name,
        string $description,
        Attributes $attributes
    ) {
        $this->id = $id;
        $this->startingLocationId = $startingLocationId;
        $this->name = $name;
        $this->description = $description;
        $this->attributes = $attributes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStrength(): int
    {
        return $this->attributes->getStrength();
    }

    public function getAgility(): int
    {
        return $this->attributes->getAgility();
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

    public function getDescription(): string
    {
        return $this->description;
    }

}