<?php

namespace App\Helpers;

use Illuminate\Http\Response;

trait ApiHelper
{
    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondBadRequest($message = 'Bad Request', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_BAD_REQUEST)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondServerError($message = 'Server Error', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondConflict($message = 'Conflict', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_CONFLICT)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessable($message = 'Unprocessable Entity', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnauthorized($message = 'Unauthorized', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondForbidden($message = 'Forbidden', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function respondCreated($message = 'Created', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Respond success message
     * 
     * @param  string $message
     * @return mixed
     * @author Harlequin Doyon
     */
    public function respondSuccess($message = 'Successful', $data = [], $header = [])
    {
        return $this->setStatusCode(Response::HTTP_OK)->respondWithMessageAndData($message, $data, $header);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithMessageAndData($message, $data = [], $header = [])
    {
        $response = [
            'message'       => $message,
            'status_code'   => $this->getStatusCode(),
        ];

        if (! empty($data)) $response['data'] = $data;

        return $this->respond($response, $header);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithData($data, $header = [])
    {
        $response = [
            'data'          => $data,
            'status_code'   => $this->getStatusCode(),
        ];

        return $this->respond($response, $header);
    }
}