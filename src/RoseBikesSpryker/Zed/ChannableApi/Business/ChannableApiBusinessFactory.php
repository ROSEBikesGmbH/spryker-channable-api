<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business;

use RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\OrderAdapter;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydrator;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydratorInterface;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\BillingHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\CustomerHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\ExtraHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\PriceHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\ProductsHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\ShippingHydratorPlugin;
use RoseBikesSpryker\Zed\ChannableApi\Business\Model\OrderReader;
use RoseBikesSpryker\Zed\ChannableApi\Business\Model\OrderReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \RoseBikesSpryker\Zed\ChannableApi\ChannableApiConfig getConfig()
 */
class ChannableApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \RoseBikesSpryker\Zed\ChannableApi\Business\Model\OrderReaderInterface
     */
    public function createOrderReader(): OrderReaderInterface
    {
        return new OrderReader(
            $this->createOrderAdapter(),
            $this->createApiResponseToTransferMapper()
        );
    }

    /**
     * @return \RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydratorInterface
     */
    protected function createApiResponseToTransferMapper(): ApiResponseToTransferHydratorInterface
    {
        return new ApiResponseToTransferHydrator(
            $this->getApiResponseHydratorPlugins()
        );
    }

    /**
     * @return \RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin\HydratorPluginInterface[]
     */
    protected function getApiResponseHydratorPlugins(): array
    {
        return [
           new BillingHydratorPlugin(),
           new CustomerHydratorPlugin(),
           new ExtraHydratorPlugin(),
           new PriceHydratorPlugin(),
           new ProductsHydratorPlugin(),
           new ShippingHydratorPlugin(),
        ];
    }

    /**
     * @return \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\OrderAdapter
     */
    protected function createOrderAdapter(): OrderAdapter
    {
        return new OrderAdapter(
            $this->getConfig()
        );
    }
}
