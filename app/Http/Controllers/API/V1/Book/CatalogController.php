<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use App\Models\Restrict;
use App\Models\Topic;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CatalogController extends Controller
{
    use ApiResponse;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $catalogs = [];
            $data = $request->query('payload');
            $data = collect( json_decode($data) );

            if ( $data->has('topics') && $data->get('topics') ) {
                $catalogs['topics'] = Topic::all();
            }
            if ( $data->has('restricts') && $data->get('restricts') ) {
                $catalogs['restricts'] = Restrict::all();
            }


            return response([
                'message' => 'Catalogos obtenidos correctamente',
                'success' => true,
                'catalogs' => $catalogs,
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return $this->errorResponse([
                'error' => $th->getMessage(),
                'code'=> Response::HTTP_BAD_REQUEST,
            ]);
        }
    }
}
