<?php

namespace App\Containers\AppSection\Sanctum\Tasks;

use App\Containers\AppSection\Sanctum\Data\Repositories\SanctumRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteSanctumTask extends ParentTask
{
    public function __construct(
        protected readonly SanctumRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
