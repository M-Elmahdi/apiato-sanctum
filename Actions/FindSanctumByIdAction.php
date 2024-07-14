<?php

namespace App\Containers\AppSection\Sanctum\Actions;

use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Containers\AppSection\Sanctum\Tasks\FindSanctumByIdTask;
use App\Containers\AppSection\Sanctum\UI\API\Requests\FindSanctumByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSanctumByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindSanctumByIdTask $findSanctumByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindSanctumByIdRequest $request): Sanctum
    {
        return $this->findSanctumByIdTask->run($request->id);
    }
}
