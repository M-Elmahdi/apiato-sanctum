<?php

namespace App\Containers\AppSection\Sanctum\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Sanctum\Tasks\ListSanctaTask;
use App\Containers\AppSection\Sanctum\UI\API\Requests\ListSanctaRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListSanctaAction extends ParentAction
{
    public function __construct(
        private readonly ListSanctaTask $listSanctaTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListSanctaRequest $request): mixed
    {
        return $this->listSanctaTask->run();
    }
}
