<?php
namespace Aecor\Address\Traits;

use Aecor\Address\Models\Address;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAddress
{
    abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'model');
    }

    public function addAddress($data)
    {
        return $this->addresses()->create($data);
    }

    public function addManyAddresses(array $records)
    {
        $addresses = [];
        foreach ($records as $record) {
            $addresses[] = $this->addresses()->create($record);
        }
        return $addresses;
    }
}
