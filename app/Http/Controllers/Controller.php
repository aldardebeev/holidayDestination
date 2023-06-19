<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="Holiday Destination",
 *      version="1.0.0",
 *      @OA\Contact(
 *          email="admin@example.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name = "Auth",
 *     description = "Auth description",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API Server",
 *     url="http://localhost:83/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 *)
 *
 * @OA\Schema(
 *     schema="User",
 *      type="object",
 *      required={"email", "password"},
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          description="User email"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          type="string",
 *          description="User password"
 *      )
 * )
 * @OA\Schema(
 *     schema="Destinations",
 *     required={"id", "name", "long", "lat"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Место назначения"),
 *     @OA\Property(property="long", type="float", example=50.123456),
 *     @OA\Property(property="lat", type="float", example=30.654321),
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
