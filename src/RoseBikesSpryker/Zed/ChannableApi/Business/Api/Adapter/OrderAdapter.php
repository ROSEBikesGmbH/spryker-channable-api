<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use GuzzleHttp\Psr7\Response;
use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;

class OrderAdapter extends AbstractAdapter
{
    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return sprintf(
            ChannableApiConstants::API_ENDPOINT_BASE,
            $this->config->getHost(),
            $this->config->getCompanyId(),
            $this->getProjectId(),
            ChannableApiConstants::API_ENDPOINT_ORDERS
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer|null $channableOrderUpdateTransfer
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function send(?ChannableOrderUpdateTransfer $channableOrderUpdateTransfer = null): Response
    {
        return $this->sendRequest(AdapterInterface::REQUEST_METHOD_GET);
    }
}
