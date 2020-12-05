<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMetaData extends Model
{
    protected $guarded = [];

    /**
     * Get the service meta associated with the service meta data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function serviceMeta()
    {
        return $this->belongsTo(ServiceMeta::class);
    }

    /**
     * Get the customer associated with the service meta data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
