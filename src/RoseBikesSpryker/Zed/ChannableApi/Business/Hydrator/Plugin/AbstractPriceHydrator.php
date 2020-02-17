<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

abstract class AbstractPriceHydrator
{
    /**
     * @const int
     */
    public const PRICE_MULTIPLIER = 100;

    /**
     * @const int
     */
    public const PRICE_SCALE = 2;

    /**
     * @param string $price
     *
     * @return int
     */
    public function convertPriceToInteger(string $price): int
    {
        return (int)bcmul($price, static::PRICE_MULTIPLIER, static::PRICE_SCALE);
    }
}
