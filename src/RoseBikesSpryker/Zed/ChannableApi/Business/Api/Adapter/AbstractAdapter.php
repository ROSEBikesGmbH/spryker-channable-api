<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use RoseBikesSpryker\Zed\ChannableApi\Business\Exception\ChannableApiHttpRequestException;
use RoseBikesSpryker\Zed\ChannableApi\ChannableApiConfig;

abstract class AbstractAdapter implements AdapterInterface
{
    protected const DEFAULT_TIMEOUT = 30;
    protected const DEFAULT_HEADERS = [
        'Content-Type' => 'application/json',
    ];

    /**
     * @var \RoseBikesSpryker\Zed\ChannableApi\ChannableApiConfig
     */
    protected $config;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @param array $options
     *
     * @return string
     */
    abstract protected function getUrl(array $options): string;

    /**
     * @param \RoseBikesSpryker\Zed\ChannableApi\ChannableApiConfig $config
     */
    public function __construct(ChannableApiConfig $config)
    {
        $this->config = $config;
        $this->client = new Client([
            RequestOptions::TIMEOUT => static::DEFAULT_TIMEOUT,
        ]);
    }

    /**
     * @param array $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest(array $options): ResponseInterface
    {
        $options['headers'] = [
            'Authorization' => 'Bearer ' . $this->config->getToken(),
        ];

        return $this->send($options);
    }

    /**
     * @param array $options
     *
     * @throws \RoseBikesSpryker\Zed\ChannableApi\Business\Exception\ChannableApiHttpRequestException
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function send(array $options = []): ResponseInterface
    {
        try {
            $response = $this->client->request(
                'GET',
                $this->getUrl($options),
                $options
            );
        } catch (RequestException $requestException) {
            throw new ChannableApiHttpRequestException(
                $requestException->getMessage(),
                $requestException->getCode(),
                $requestException
            );
        }

        return $response;
    }
}
