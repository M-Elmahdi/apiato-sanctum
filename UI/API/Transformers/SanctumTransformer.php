<?php

namespace App\Containers\AppSection\Sanctum\UI\API\Transformers;

use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SanctumTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Sanctum $sanctum): array
    {
        $response = [
            'object' => $sanctum->getResourceKey(),
            'id' => $sanctum->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $sanctum->id,
            'created_at' => $sanctum->created_at,
            'updated_at' => $sanctum->updated_at,
            'readable_created_at' => $sanctum->created_at->diffForHumans(),
            'readable_updated_at' => $sanctum->updated_at->diffForHumans(),
            // 'deleted_at' => $sanctum->deleted_at,
        ], $response);
    }
}
