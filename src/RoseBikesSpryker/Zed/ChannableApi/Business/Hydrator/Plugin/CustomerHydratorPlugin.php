<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableCustomerTransfer;
use Generated\Shared\Transfer\ChannableOrderTransfer;

class CustomerHydratorPlugin implements HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $channableCustomerTransfer = new ChannableCustomerTransfer();
        $channableCustomerTransfer->fromArray($order['data']['customer'], true);

        $channableOrderTransfer->setCustomer($channableCustomerTransfer);

        return $channableOrderTransfer;
    }
}
