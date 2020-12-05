<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    /**
     * Get the services associated with the customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Get the service meta datas associated with the customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function serviceMetaDatas()
    {
        return $this->hasMany(ServiceMetaData::class);
    }
}
