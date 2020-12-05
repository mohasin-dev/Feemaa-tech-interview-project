<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMeta extends Model
{
    protected $guarded = [];

    /**
     * Get the service meta data associated with the service meta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function serviceMetaData()
    {
        return $this->hasMany(ServiceMetaData::class);
    }

    /**
     * Get the service associated with the service meta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
