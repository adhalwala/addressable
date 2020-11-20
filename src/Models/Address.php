<?php

namespace Aecor\Address\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function getTable()
    {
        return config('addressable.table-name');
    }

    protected $guarded = [];

    protected $casts = [
        'custom_attributes' => 'array',
        'order_column' => 'integer',
    ];

    protected $fillable = [
        'type',
        'unit',
        'house_number',
        'street',
        'suburb',
        'postcode',
        'state',
        'latitude',
        'longitude',
        'custom_attributes',
        'order_column',
    ];

    public function addressable()
    {
        return $this->morphTo('model');
    }
}
