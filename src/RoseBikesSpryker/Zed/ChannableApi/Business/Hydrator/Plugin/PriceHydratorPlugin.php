<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableOrderTransfer;
use Generated\Shared\Transfer\ChannablePriceTransfer;

class PriceHydratorPlugin implements HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $channablePriceTransfer = new ChannablePriceTransfer();
        $channablePriceTransfer->fromArray($order['data']['price'], true);

        $channableOrderTransfer->setPrice($channablePriceTransfer);

        return $channableOrderTransfer;
    }
}
