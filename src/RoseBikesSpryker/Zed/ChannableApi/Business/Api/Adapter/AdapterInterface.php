<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use Psr\Http\Message\ResponseInterface;

interface AdapterInterface
{
    /**
     * @param array $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest(array $options): ResponseInterface;
}
