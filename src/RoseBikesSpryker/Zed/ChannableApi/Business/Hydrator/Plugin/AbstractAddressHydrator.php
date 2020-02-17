<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Hydrator\Plugin;

use Generated\Shared\Transfer\ChannableAddressTransfer;

abstract class AbstractAddressHydrator
{
    public const FIELD_HOUSE_NUMBER_EXT = 'house_number_ext';

    /**
     * @param \Generated\Shared\Transfer\ChannableAddressTransfer $channableAddressTransfer
     * @param array $channableAddress
     *
     * @return \Generated\Shared\Transfer\ChannableAddressTransfer
     */
    protected function mapAddress(
        ChannableAddressTransfer $channableAddressTransfer,
        array $channableAddress
    ): ChannableAddressTransfer
    {
        $channableAddressTransfer->fromArray($channableAddress, true);

        if (isset($channableAddress[static::FIELD_HOUSE_NUMBER_EXT])
            && !empty($channableAddress[static::FIELD_HOUSE_NUMBER_EXT])) {
            $channableAddressTransfer->setHouseNumberExtension($channableAddress[static::FIELD_HOUSE_NUMBER_EXT]);
        }

        return $channableAddressTransfer;
    }
}
