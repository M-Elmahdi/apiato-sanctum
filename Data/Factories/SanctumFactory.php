<?php

namespace App\Containers\AppSection\Sanctum\Data\Factories;

use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of SanctumFactory
 *
 * @extends ParentFactory<TModel>
 */
class SanctumFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Sanctum::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
