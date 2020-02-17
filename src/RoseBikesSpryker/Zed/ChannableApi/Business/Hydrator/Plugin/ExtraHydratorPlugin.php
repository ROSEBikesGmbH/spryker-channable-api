<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableExtraTransfer;
use Generated\Shared\Transfer\ChannableOrderTransfer;

class ExtraHydratorPlugin implements HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $channableExtraTransfer = new ChannableExtraTransfer();
        $channableExtraTransfer->fromArray($order['data']['extra'], true);

        $channableOrderTransfer->setExtra($channableExtraTransfer);

        return $channableOrderTransfer;
    }
}
