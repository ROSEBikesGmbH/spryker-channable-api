<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Model;

use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;

interface OrderWriterInterface
{
    /**
     * @param ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     *
     * @return void
     */
    public function shipmentUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void;

    /**
     * @param ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     *
     * @return void
     */
    public function cancellationUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void;
}
