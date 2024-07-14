<?php

namespace App\Containers\AppSection\Sanctum\Tasks;

use App\Containers\AppSection\Sanctum\Data\Repositories\SanctumRepository;
use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateSanctumTask extends ParentTask
{
    public function __construct(
        protected readonly SanctumRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Sanctum
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
