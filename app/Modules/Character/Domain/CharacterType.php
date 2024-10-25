<?php


namespace App\Modules\Character\Domain;

use InvalidArgumentException;

class CharacterType
{
    public const PLAYER = 'player';
    public const MONSTER = 'monster';

    public const TYPES = [
        self::PLAYER,
        self::MONSTER,
    ];

    private $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::TYPES, true)) {
            throw new InvalidArgumentException("$value is not a valid Character Type");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}