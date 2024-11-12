<?php

namespace App\Modules\Character\Domain\Model;

use App\Traits\ThrowsDice;

class HitPoints
{
    use ThrowsDice;

    /**
     * @var int
     */
    private $currentHitPoints;

    /**
     * @var int
     */
    private $maximumHitPoints;

    public static function byRace(Race $race): HitPoints
    {
        $maximumHitPoints = self::constitutionToHitPoints($race->getConstitution());

        return new HitPoints($maximumHitPoints, $maximumHitPoints);
    }

    public function withIncrementedConstitution(): HitPoints
    {
        return new HitPoints(
            $this->currentHitPoints,
            $this->maximumHitPoints + self::constitutionToHitPoints(1)
        );
    }

    public function withUpdatedCurrentValue(int $points): HitPoints
    {
        return new HitPoints(
            $this->currentHitPoints + $points,
            $this->maximumHitPoints
        );
    }

    protected static function constitutionToHitPoints(int $constitutionPoints): int
    {
        return $constitutionPoints * 10 + self::ThrowD6() + self::ThrowD6();
    }

    public function __construct(int $currentHitPoints, int $maximumHitPoints)
    {
        $this->currentHitPoints = $currentHitPoints;
        $this->maximumHitPoints = $maximumHitPoints;
    }

    public function getCurrentHitPoints(): int
    {
        return $this->currentHitPoints;
    }

    public function getMaximumHitPoints(): int
    {
        return $this->maximumHitPoints;
    }
}