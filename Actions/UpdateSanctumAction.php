<?php

namespace App\Containers\AppSection\Sanctum\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Containers\AppSection\Sanctum\Tasks\UpdateSanctumTask;
use App\Containers\AppSection\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSanctumAction extends ParentAction
{
    public function __construct(
        private readonly UpdateSanctumTask $updateSanctumTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSanctumRequest $request): Sanctum
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateSanctumTask->run($data, $request->id);
    }
}
