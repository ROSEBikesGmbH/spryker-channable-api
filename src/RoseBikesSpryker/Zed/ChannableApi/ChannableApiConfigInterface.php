<?php

namespace RoseBikesSpryker\Zed\ChannableApi;

interface ChannableApiConfigInterface
{
    /**
     * @return string
     */
    public function getCompanyId(): string;

    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @return string
     */
    public function getHost(): string;
}
