<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Model;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;
use Generated\Shared\Transfer\ChannableRequestTransfer;

interface OrderReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ChannableRequestTransfer $channableRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function getOrders(ChannableRequestTransfer $channableRequestTransfer): ChannableOrderResponseTransfer;
}
