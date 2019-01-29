<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;

class OrderAdapter extends AbstractAdapter
{
    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return sprintf(
            '%s/companies/%s/projects/%s/%s',
            $this->config->getHost(),
            $this->config->getCompanyId(),
            $this->config->getProjectId(),
            ChannableApiConstants::API_ENDPOINT_ORDERS
        );
    }
}
