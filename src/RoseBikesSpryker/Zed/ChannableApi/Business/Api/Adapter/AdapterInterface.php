<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use GuzzleHttp\Psr7\Response;

interface AdapterInterface
{
    public const REQUEST_METHOD_GET = 'GET';
    public const REQUEST_METHOD_POST = 'POST';

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer|null $channableOrderUpdateTransfer
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function send(?ChannableOrderUpdateTransfer $channableOrderUpdateTransfer = null): Response;

    /**
     * @param string $requestMethod
     * @param string $body
     *
     * @return @return \GuzzleHttp\Psr7\Response
     */
    public function sendRequest(string $requestMethod, string $body = ''): Response;
}
