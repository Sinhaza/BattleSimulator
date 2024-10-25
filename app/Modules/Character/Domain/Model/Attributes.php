<?php


namespace App\Modules\Character\Domain\Model;


use Illuminate\Support\Collection;

class Attributes
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct($items = [])
    {
        $this->collection = new Collection($items);
    }

    public function addAvailablePoints(int $points): Attributes
    {
        $data = $this->collection->all();

        $data['unassigned'] += $points;

        return new static($data);
    }

    public function assignAvailablePoint(string $attribute): Attributes
    {
        $data = $this->collection->all();

        $data['unassigned']--;
        $data[$attribute]++;

        return new static($data);
    }

    public function hasAvailablePoints(): bool
    {
        return (bool) $this->collection->get('unassigned');
    }

    public function getStrength(): int
    {
        return $this->collection->get('strength');
    }

    public function getDexterity(): int
    {
        return $this->collection->get('dexterity');
    }

    public function getConstitution(): int
    {
        return $this->collection->get('constitution');
    }

    public function getIntelligence(): int
    {
        return $this->collection->get('intelligence');
    }

    public function getCharisma(): int
    {
        return $this->collection->get('charisma');
    }

    public function getUnassignedAttributePoints(): int
    {
        return $this->collection->get('unassigned');
    }
}