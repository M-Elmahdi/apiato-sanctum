<?php

namespace App\Containers\AppSection\Sanctum\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Sanctum\Actions\CreateSanctumAction;
use App\Containers\AppSection\Sanctum\Actions\DeleteSanctumAction;
use App\Containers\AppSection\Sanctum\Actions\FindSanctumByIdAction;
use App\Containers\AppSection\Sanctum\Actions\ListSanctaAction;
use App\Containers\AppSection\Sanctum\Actions\UpdateSanctumAction;
use App\Containers\AppSection\Sanctum\UI\API\Requests\CreateSanctumRequest;
use App\Containers\AppSection\Sanctum\UI\API\Requests\DeleteSanctumRequest;
use App\Containers\AppSection\Sanctum\UI\API\Requests\FindSanctumByIdRequest;
use App\Containers\AppSection\Sanctum\UI\API\Requests\ListSanctaRequest;
use App\Containers\AppSection\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Containers\AppSection\Sanctum\UI\API\Transformers\SanctumTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    public function __construct(
        private readonly CreateSanctumAction $createSanctumAction,
        private readonly UpdateSanctumAction $updateSanctumAction,
        private readonly FindSanctumByIdAction $findSanctumByIdAction,
        private readonly ListSanctaAction $listSanctaAction,
        private readonly DeleteSanctumAction $deleteSanctumAction,
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function createSanctum(CreateSanctumRequest $request): JsonResponse
    {
        $sanctum = $this->createSanctumAction->run($request);

        return $this->created($this->transform($sanctum, SanctumTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSanctumById(FindSanctumByIdRequest $request): array
    {
        $sanctum = $this->findSanctumByIdAction->run($request);

        return $this->transform($sanctum, SanctumTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function listSancta(ListSanctaRequest $request): array
    {
        $sancta = $this->listSanctaAction->run($request);

        return $this->transform($sancta, SanctumTransformer::class);
    }

    /**
     * @throws IncorrectIdException
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function updateSanctum(UpdateSanctumRequest $request): array
    {
        $sanctum = $this->updateSanctumAction->run($request);

        return $this->transform($sanctum, SanctumTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteSanctum(DeleteSanctumRequest $request): JsonResponse
    {
        $this->deleteSanctumAction->run($request);

        return $this->noContent();
    }
}
