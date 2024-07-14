<?php

namespace App\Containers\AppSection\Sanctum\Tasks;

use App\Containers\AppSection\Sanctum\Data\Repositories\SanctumRepository;
use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindSanctumByIdTask extends ParentTask
{
    public function __construct(
        protected readonly SanctumRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Sanctum
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
