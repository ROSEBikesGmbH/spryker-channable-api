<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;
use Generated\Shared\Transfer\ChannableOrderTransfer;

class ApiResponseToTransferHydrator implements ApiResponseToTransferHydratorInterface
{
    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\HydratorPluginInterface[]
     */
    protected $apiResponseHydratorPlugins;

    /**
     * @param array $apiResponseHydratorPlugins
     */
    public function __construct(array $apiResponseHydratorPlugins)
    {
        $this->apiResponseHydratorPlugins = $apiResponseHydratorPlugins;
    }

    /**
     * @param array $orders
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function hydrate(array $orders): ChannableOrderResponseTransfer
    {
        $channableOrderResponseTransfer = new ChannableOrderResponseTransfer();
        $channableOrderResponseTransfer->setTotal($orders['total']);
        $channableOrderResponseTransfer->setErrorCount($orders['error_count']);

        foreach ($orders['orders'] as $order) {
            $channableOrderResponseTransfer->addChannableOrder($this->hydrateOrder($order));
        }

        return $channableOrderResponseTransfer;
    }

    /**
     * @param array $order
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrateOrder(array $order): ChannableOrderTransfer
    {
        $channableOrderTransfer = new ChannableOrderTransfer();
        $channableOrderTransfer->fromArray($order, true);

        foreach ($this->apiResponseHydratorPlugins as $plugin) {
            $channableOrderTransfer = $plugin->hydrate($order, $channableOrderTransfer);
        }

        return $channableOrderTransfer;
    }
}
