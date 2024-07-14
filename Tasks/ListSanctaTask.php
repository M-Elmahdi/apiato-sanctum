<?php

namespace App\Containers\AppSection\Sanctum\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Sanctum\Data\Repositories\SanctumRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListSanctaTask extends ParentTask
{
    public function __construct(
        protected readonly SanctumRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
