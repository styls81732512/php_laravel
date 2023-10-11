<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * For select
     */
    protected function respondOk($data)
    {
        return $this->respond($data, '00', Response::HTTP_OK);
    }

    /**
     * For create
     */
    protected function respondCreated(string $id)
    {
        return $this->respond(["id" => $id], '00', Response::HTTP_CREATED);
    }

    /**
     * For update or delete
     */
    protected function respondNoContent()
    {
        return $this->respond(null, '00', Response::HTTP_OK);
    }

    protected function respondError(string $message, string $code, $statusCode)
    {
        return response(["code" => $code, "message" => $message], $statusCode);
    }

    private function respond($data, string $code, $statusCode)
    {
        $output = [
            "code" => $code,
            "data" => $data,
        ];

        return response($output, $statusCode);
    }
}
