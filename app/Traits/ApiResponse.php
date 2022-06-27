<?php

namespace App\Traits;

// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

trait ApiResponse {


    /**
     * successResponse
     *
     * @param [array] $data
     * @param [int] $code
     * @return void
     */
    private function successResponse( $data, $code )
    {
        return response()->json( $data, $code );
    }

    /**
     * errorResponse
     *
     * @param [String] $message
     * @param [int] $code
     * @return void
     */
    protected function errorResponse($error)
    {
        $message = Arr::exists($error, 'message');
        $errorMessage = '';

        if (Arr::exists($error, 'error')) {
            if (config('app.debug'))
                $errorMessage = $error['error'];
        }

        return response()->json( [
            'success' => false,
            'message' => $message ? $error['message'] : 'Algo salió mal',
            'error' => $errorMessage,
        ], $error['code']);
    }

    /**
     * showAll
     *
     * @param Collection $collection
     * @param integer $code
     * @return void
     */
    protected function showAll( Collection $collection, $code = 200 )
    {
        return $this->successResponse(['success' => true, 'data' => $collection], $code );
    }

    /**
     * Undocumented showOne
     *
     * @param Model $instance
     * @param integer $code
     * @return void
     */
    protected function showOne( Model $instance, $code = 200 )
    {
        return $this->successResponse(['success' => true, 'data' => $instance], $code );
    }
}
