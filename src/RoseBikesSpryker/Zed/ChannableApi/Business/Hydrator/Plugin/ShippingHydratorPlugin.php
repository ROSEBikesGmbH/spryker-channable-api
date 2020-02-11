<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableAddressTransfer;
use Generated\Shared\Transfer\ChannableOrderTransfer;

class ShippingHydratorPlugin extends AbstractHydrator implements HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $channableAddressTransfer = new ChannableAddressTransfer();
        $channableAddressTransfer->fromArray($order['data']['shipping'], true);

        $channableOrderTransfer->setShipping($channableAddressTransfer);

        return $channableOrderTransfer;
    }
}
