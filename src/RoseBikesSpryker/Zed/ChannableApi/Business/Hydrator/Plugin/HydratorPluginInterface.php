<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableOrderTransfer;

interface HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer;
}
