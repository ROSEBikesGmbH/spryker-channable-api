<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use RoseBikesSpryker\Shared\ChannableApi\ChannableApiConstants;

class OrderAdapter extends AbstractAdapter
{
    /**
     * @param array $options
     *
     * @return string
     */
    protected function getUrl(array $options): string
    {
        return sprintf(
            '%s/companies/%s/projects/%s/%s',
            $this->config->getHost(),
            $this->config->getCompanyId(),
            $options['query']['project_id'],
            ChannableApiConstants::API_ENDPOINT_ORDERS
        );
    }
}
