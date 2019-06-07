<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableOrderTransfer;
use Generated\Shared\Transfer\ChannablePriceTransfer;

class PriceHydratorPlugin implements HydratorPluginInterface
{
    public const PRICE_MULTIPLIER = 100;

    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $channablePriceTransfer = new ChannablePriceTransfer();
        $channablePriceTransfer->setCommission($order['data']['price']['commission'] * static::PRICE_MULTIPLIER);
        $channablePriceTransfer->setShipping($order['data']['price']['shipping'] * static::PRICE_MULTIPLIER);
        $channablePriceTransfer->setTotal($order['data']['price']['total'] * static::PRICE_MULTIPLIER);
        $channablePriceTransfer->setSubTotal($order['data']['price']['subtotal'] * static::PRICE_MULTIPLIER);
        $channablePriceTransfer->setTransactionFee($order['data']['price']['transaction_fee'] * static::PRICE_MULTIPLIER);
        $channablePriceTransfer->setCurrency($order['data']['price']['currency']);
        $channablePriceTransfer->setPaymentMethod($order['data']['price']['payment_method']);
        $channablePriceTransfer->setTransactionId($order['data']['price']['transaction_id']);
        $channableOrderTransfer->setPrice($channablePriceTransfer);

        return $channableOrderTransfer;
    }
}
