<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;

interface ApiResponseToTransferHydratorInterface
{
    /**
     * @param array $orders
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function hydrate(array $orders): ChannableOrderResponseTransfer;
}
