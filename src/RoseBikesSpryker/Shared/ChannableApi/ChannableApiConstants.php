<?php

namespace RoseBikesSpryker\Shared\ChannableApi;

interface ChannableApiConstants
{
    public const CONFIG_CHANNABLE_COMPANY_ID = 'CONFIG:CHANNABLE_COMPANY_ID';
    public const CONFIG_CHANNABLE_TOKEN = 'CONFIG:CHANNABLE_TOKEN';
    public const CONFIG_CHANNABLE_HOST = 'CONFIG:CHANNABLE_HOST';

    public const API_ENDPOINT_ORDERS = 'orders';

    public const HEADER_AUTHORIZATION = 'Authorization: Bearer';

    public const VALID_STATUS_VALUES = [
        'not_shipped',
        'shipped',
        'cancelled',
        'waiting',
    ];
}
