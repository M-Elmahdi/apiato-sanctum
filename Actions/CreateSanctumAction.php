<?php

namespace App\Containers\AppSection\Sanctum\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Sanctum\Models\Sanctum;
use App\Containers\AppSection\Sanctum\Tasks\CreateSanctumTask;
use App\Containers\AppSection\Sanctum\UI\API\Requests\CreateSanctumRequest;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Str;

class CreateSanctumAction extends ParentAction
{
    public function __construct(
        private readonly CreateSanctumTask $createSanctumTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSanctumRequest $request): Sanctum
    {
        $sanitizedData = $request->sanitizeInput([
            'email',
            'password',
            'name',
            'gender',
            'birth',

        ]);

        $user = User::first();
        $token = $user->createToken(Str::slug(strtolower($user->name)) );
        $token= explode('|', $token->plainTextToken) ;
        $user->token = $token[1];
        $user->token_id = $token[0];

        return $user;
    }
}
