<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableOrderTransfer;
use Generated\Shared\Transfer\ChannablePriceTransfer;

class PriceHydratorPlugin extends AbstractPriceHydrator implements HydratorPluginInterface
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
        $channablePriceTransfer->setCommission($this->convertPriceToInteger($order['data']['price']['commission']));
        $channablePriceTransfer->setShipping($this->convertPriceToInteger($order['data']['price']['shipping']));
        $channablePriceTransfer->setTotal($this->convertPriceToInteger($order['data']['price']['total']));
        $channablePriceTransfer->setSubTotal($this->convertPriceToInteger($order['data']['price']['subtotal']));
        $channablePriceTransfer->setTransactionFee($this->convertPriceToInteger($order['data']['price']['transaction_fee']));
        $channablePriceTransfer->setCurrency($order['data']['price']['currency']);
        $channablePriceTransfer->setPaymentMethod($order['data']['price']['payment_method']);
        $channablePriceTransfer->setTransactionId($order['data']['price']['transaction_id']);
        $channableOrderTransfer->setPrice($channablePriceTransfer);

        return $channableOrderTransfer;
    }
}
