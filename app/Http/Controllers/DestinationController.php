<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
/**
 * @OA\Tag(
 *     name="Destinations",
 *     description="Authentication endpoints"
 * )
 */
class DestinationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/get-destinations",
     *     summary="Получить список мест назначения",
     *     tags={"Destinations"},
     *     security={{"BearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Destinations")),
     *         ),
     *     ),
     *     @OA\Response(response=401, description="Неавторизованный доступ"),
     * )
     */

    public function getDestinations()
    {
        $data = Destination::all();
        return response()->json(['data' => $data]);
    }
}
