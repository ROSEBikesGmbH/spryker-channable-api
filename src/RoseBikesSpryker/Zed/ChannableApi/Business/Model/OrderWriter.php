<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Model;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\CancellationUpdateAdapter;
use RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\ShipmentUpdateAdapter;

class OrderWriter implements OrderWriterInterface
{
    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\CancellationUpdateAdapter
     */
    protected $cancellationUpdateAdapter;

    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\ShipmentUpdateAdapter
     */
    protected $shipmentUpdateAdapter;

    /**
     * @param \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\CancellationUpdateAdapter $cancellationUpdateAdapter
     * @param \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\ShipmentUpdateAdapter $shipmentUpdateAdapter
     */
    public function __construct(CancellationUpdateAdapter $cancellationUpdateAdapter, ShipmentUpdateAdapter $shipmentUpdateAdapter)
    {
        $this->cancellationUpdateAdapter = $cancellationUpdateAdapter;
        $this->shipmentUpdateAdapter = $shipmentUpdateAdapter;
    }

    /**
     * @return void
     */
    public function shipmentUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void
    {
        $this->shipmentUpdateAdapter->send($channableOrderUpdateTransfer);
    }

    /**
     * @return void
     */
    public function cancellationUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void
    {
        $this->cancellationUpdateAdapter->send($channableOrderUpdateTransfer);
    }
}
