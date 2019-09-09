<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use GuzzleHttp\Psr7\Response;
use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;

class ShipmentUpdateAdapter extends AbstractAdapter
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
            sprintf(ChannableApiConstants::API_ENDPOINT_ORDERS_SHIPMENT_UPDATE, $this->getOrderId())
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

        $body = [];

        if (!empty($channableOrderUpdateTransfer->getTrackingCode())) {
            $body['tracking_code'] = $channableOrderUpdateTransfer->getTrackingCode();
        }

        if (!empty($channableOrderUpdateTransfer->getTrackingUrl())) {
            $body['tracking_url'] = $channableOrderUpdateTransfer->getTrackingUrl();
        }

        if (!empty($channableOrderUpdateTransfer->getTrackingTransporter())) {
            $body['transporter'] = $channableOrderUpdateTransfer->getTrackingTransporter();
        }

        $body = json_encode($body);

        return $this->sendRequest(AdapterInterface::REQUEST_METHOD_POST, $body);
    }
}
