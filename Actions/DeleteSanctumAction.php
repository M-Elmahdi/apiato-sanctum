<?php

namespace App\Containers\AppSection\Sanctum\Actions;

use App\Containers\AppSection\Sanctum\Tasks\DeleteSanctumTask;
use App\Containers\AppSection\Sanctum\UI\API\Requests\DeleteSanctumRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSanctumAction extends ParentAction
{
    public function __construct(
        private readonly DeleteSanctumTask $deleteSanctumTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSanctumRequest $request): int
    {
        return $this->deleteSanctumTask->run($request->id);
    }
}
