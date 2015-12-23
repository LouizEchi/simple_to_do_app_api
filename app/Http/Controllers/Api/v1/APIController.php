<?php

namespace App\Http\Controllers\Api\v1;


use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    use ApiHelper;

    /**
     * Respond validation failed.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Harlequin Doyon <harley@idearobin.com>
     */
    protected function respondValidationFailed($data)
    {
        return $this->respondUnprocessable(trans('validation.failed'), $data);
    }

    /**
     * Respond successfully added.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Harlequin Doyon <harley@idearobin.com>
     */
    protected function respondSuccessfullyAdded($message)
    {
        return $this->respondSuccess(trans('messages.success.added', ['field' => $message]));
    }

    /**
     * Respond successfully updated.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Harlequin Doyon <harley@idearobin.com>
     */
    protected function respondSuccessfullyUpdated($message)
    {
        return $this->respondSuccess(trans('messages.success.updated', ['field' => $message]));
    }

    /**
     * Respond successfully removed.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Harlequin Doyon <harley@idearobin.com>
     */
    protected function respondSuccessfullyRemoved($message)
    {
        return $this->respondSuccess(trans('messages.success.removed', ['field' => $message]));
    }
}
