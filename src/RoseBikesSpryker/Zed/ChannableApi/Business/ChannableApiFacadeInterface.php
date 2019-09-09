<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;
use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use Generated\Shared\Transfer\ChannableRequestTransfer;

interface ChannableApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ChannableRequestTransfer $channableRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function getOrders(ChannableRequestTransfer $channableRequestTransfer): ChannableOrderResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     *
     * @return void
     */
    public function shipmentUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     *
     * @return void
     */
    public function cancellationUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void;
}
