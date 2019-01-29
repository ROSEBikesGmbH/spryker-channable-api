<?php

namespace RoseBikesSpryker\Zed\ChannableApi;

use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

interface ChannableApiConfigInterface
{
    /**
     * @return string
     */
    public function getCompanyId(): string;

    /**
     * @return string
     */
    public function getProjectId(): string;

    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @return string
     */
    public function getHost(): string;
}
