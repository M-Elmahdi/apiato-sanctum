<?php

/**
 * @apiGroup           Sanctum
 * @apiName            UpdateSanctum
 *
 * @api                {PATCH} /v1/sanctum/:id Update Sanctum
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Sanctum\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('sanctum/{id}', Controller::class)
    ->middleware(['auth:api']);

