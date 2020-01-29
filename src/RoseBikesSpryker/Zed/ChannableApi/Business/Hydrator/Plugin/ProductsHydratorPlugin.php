<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use ArrayObject;
use Generated\Shared\Transfer\ChannableOrderTransfer;
use Generated\Shared\Transfer\ChannableProductTransfer;

class ProductsHydratorPlugin extends AbstractHydrator implements HydratorPluginInterface
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
            $channableProductTransfer->setPrice($this->convertPriceToInteger($product['price']));

            $products->append($channableProductTransfer);
        }

        $channableOrderTransfer->setProducts($products);

        return $channableOrderTransfer;
    }
}
