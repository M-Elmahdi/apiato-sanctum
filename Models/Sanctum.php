<?php

namespace App\Containers\AppSection\Sanctum\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Sanctum extends ParentModel
{
    protected $table='sanctum_personal_access_tokens' ;

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Sanctum';
}
