<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use ArrayObject;
use Generated\Shared\Transfer\ChannableOrderTransfer;
use Generated\Shared\Transfer\ChannableProductTransfer;

class ProductsHydratorPlugin implements HydratorPluginInterface
{
    /**
     * @param array $order
     * @param \Generated\Shared\Transfer\ChannableOrderTransfer $channableOrderTransfer
     *
     * @return \Generated\Shared\Transfer\ChannableOrderTransfer
     */
    public function hydrate(array $order, ChannableOrderTransfer $channableOrderTransfer): ChannableOrderTransfer
    {
        $products = new ArrayObject();

        foreach ($order['data']['products'] as $product) {
            $channableProductTransfer = new ChannableProductTransfer();
            $channableProductTransfer->fromArray($product, true);

            $products->append($channableProductTransfer);
        }

        $channableOrderTransfer->setProducts($products);

        return $channableOrderTransfer;
    }
}
