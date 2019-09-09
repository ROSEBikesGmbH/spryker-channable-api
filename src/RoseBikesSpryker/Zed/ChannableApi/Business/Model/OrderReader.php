<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Model;

use Generated\Shared\Transfer\ChannableOrderResponseTransfer;
use Generated\Shared\Transfer\ChannableRequestTransfer;
use RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\AdapterInterface;
use RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\OrderAdapter;
use RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydratorInterface;

class OrderReader implements OrderReaderInterface
{
    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\AdapterInterface
     */
    protected $orderAdapter;

    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydratorInterface
     */
    protected $apiResponseToTransferHydrator;

    /**
     * @param \RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter\OrderAdapter $orderAdapter
     * @param \RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\ApiResponseToTransferHydratorInterface $apiResponseToTransferHydrator
     */
    public function __construct(OrderAdapter $orderAdapter, ApiResponseToTransferHydratorInterface $apiResponseToTransferHydrator)
    {
        $this->orderAdapter = $orderAdapter;
        $this->apiResponseToTransferHydrator = $apiResponseToTransferHydrator;
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableRequestTransfer $channableRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderResponseTransfer
     */
    public function getOrders(ChannableRequestTransfer $channableRequestTransfer): ChannableOrderResponseTransfer
    {
        $this->checkRequirements($channableRequestTransfer);

        $this->orderAdapter->setQueryParameter($channableRequestTransfer->toArray());
        $this->orderAdapter->setProjectId($channableRequestTransfer->getProjectId());

        $channableOrders = $this
            ->orderAdapter
            ->send()
            ->getBody()
            ->getContents();

        return $this->apiResponseToTransferHydrator->hydrate(\GuzzleHttp\json_decode($channableOrders, true));
    }

    /**
     * @param \Generated\Shared\Transfer\ChannableRequestTransfer $channableRequestTransfer
     *
     * @return void
     */
    public function checkRequirements(ChannableRequestTransfer $channableRequestTransfer): void
    {
        $channableRequestTransfer->requireProjectId();
    }
}
