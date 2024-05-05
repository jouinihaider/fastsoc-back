<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Success response method.
     *
     * @param null $data
     * @param int $code
     * @param array|null $filters
     * @param null $infos
     * @Param string|null $message
     * @return JsonResponse
     */
    public function success($data=null, int $code=200, array $filters=null, $infos=null, string $message=null): JsonResponse
    {
        // Paginator
        $paginator = null;

        // Pagination
        if (optional($data)->resource && $data->resource instanceof LengthAwarePaginator) {
            $paginator['currentPage'] = $data->resource->currentPage();
            $paginator['from'] = $data->resource->firstItem() ?? 1;
            $paginator['lastPage'] = $data->resource->lastPage();
            $paginator['perPage'] = $data->resource->perPage();
            $paginator['to'] = $data->resource->lastItem() ?? 1;
            $paginator['total'] = $data->resource->total();
            $paginator['links']['first'] = $data->resource->url(1);
            $paginator['links']['last'] = $data->resource->url($data->resource->lastPage());
            $paginator['links']['prev'] = $data->resource->previousPageUrl();
            $paginator['links']['next'] = $data->resource->nextPageUrl();
            $paginator['linksList'][] = array('url' => $data->resource->previousPageUrl(), 'label' => trans('pagination.previous'), 'isActive' => false);
            for ($i=1; $i<=$data->resource->lastPage(); $i++) $paginator['linksList'][] = array('url' => $data->resource->url($i), 'label' => $i, 'isActive' => $data->resource->currentPage()==$i);
            $paginator['linksList'][] = array('url' => $data->resource->nextPageUrl(), 'label' => trans('pagination.next'), 'isActive' => false);
        }

        // Response
        $response = ['status' => 'Success', 'data' => $data];
        if ($paginator) $response['paginator'] = $paginator;
        if ($filters) $response['filters'] = $filters;
        if ($infos) $response['infos'] = $infos;
        if ($message) $response['message'] = $message;

        // Return response
        return response()->json($response, $code);
    }

    /**
     * Error response method.
     *
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    public function error($message, int $code=500): JsonResponse
    {
        // Message & Response
        $message = Arr::accessible($message) ? $message[0] : $message;
        $response = ['status' => 'Error', 'message' => $message];

        // Return response
        return response()->json($response, $code);
    }
}
