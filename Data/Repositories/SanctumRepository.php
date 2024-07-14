<?php

namespace App\Containers\AppSection\Sanctum\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SanctumRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
