<?php

namespace RoseBikesSpryker\Zed\ChannableApi;

use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class ChannableApiConfig extends AbstractBundleConfig implements ChannableApiConfigInterface
{
    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->get(ChannableApiConstants::CONFIG_CHANNABLE_COMPANY_ID);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->get(ChannableApiConstants::CONFIG_CHANNABLE_TOKEN);
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->get(ChannableApiConstants::CONFIG_CHANNABLE_HOST);
    }
}
