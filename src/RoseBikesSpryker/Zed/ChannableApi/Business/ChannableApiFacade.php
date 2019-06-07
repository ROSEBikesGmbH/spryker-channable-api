<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;
use Generated\Shared\Transfer\ChannableOrderUpdateTransfer;
use Generated\Shared\Transfer\ChannableRequestTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \RoseBikesSpryker\Zed\ChannableApi\Business\ChannableApiBusinessFactory getFactory()
 */
class ChannableApiFacade extends AbstractFacade implements ChannableApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ChannableRequestTransfer $channableRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function getOrders(ChannableRequestTransfer $channableRequestTransfer): ChannableOrderResponseTransfer
    {
        return $this
            ->getFactory()
            ->createOrderReader()
            ->getOrders($channableRequestTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     */
    public function shipmentUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void
    {
        $this
            ->getFactory()
            ->createOrderWriter()
            ->shipmentUpdate($channableOrderUpdateTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableOrderUpdateTransfer $channableOrderUpdateTransfer
     */
    public function cancellationUpdate(ChannableOrderUpdateTransfer $channableOrderUpdateTransfer): void
    {
        $this
            ->getFactory()
            ->createOrderWriter()
            ->cancellationUpdate($channableOrderUpdateTransfer);
    }
}
