<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use GuzzleHttp\Psr7\Response;
use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;

class CancellationUpdateAdapter extends AbstractAdapter
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
            sprintf(ChannableApiConstants::API_ENDPOINT_ORDERS_CANCELLATION_UPDATE, $this->getOrderId())
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer|null $channableOrderUpdateTransfer
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function send(?ChannableOrderUpdateTransfer $channableOrderUpdateTransfer = null): Response
    {
        $this->setProjectId($channableOrderUpdateTransfer->getProjectId());
        $this->setOrderId($channableOrderUpdateTransfer->getChannableOrderNumber());

        return $this->sendRequest(AdapterInterface::REQUEST_METHOD_POST);
    }
}
