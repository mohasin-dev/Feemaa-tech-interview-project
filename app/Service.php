<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $guarded = [];

    /**
     * Get the customers associated with the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    /**
     * Get the service metas associated with the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function serviceMetas()
    {
        return $this->hasMany(ServiceMeta::class);
    }
}
