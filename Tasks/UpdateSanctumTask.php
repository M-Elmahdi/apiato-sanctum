<?php

namespace App\Containers\AppSection\Sanctum\Tasks;

use App\Containers\AppSection\Sanctum\Data\Repositories\SanctumRepository;
use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSanctumTask extends ParentTask
{
    public function __construct(
        protected readonly SanctumRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Sanctum
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
