<?php

namespace RoseBikesSpryker\Zed\ChannableApi\Business\Api\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
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
     * @var int
     */
    protected $projectId;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var array
     */
    protected $queryParameter = [];

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @param string $orderId
     *
     * @return void
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param int $projectId
     *
     * @return void
     */
    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param array $queryParameter
     *
     * @return void
     */
    public function setQueryParameter(array $queryParameter): void
    {
        $this->queryParameter = $queryParameter;
    }

    /**
     * @return array
     */
    public function getQueryParameter(): array
    {
        return $this->queryParameter;
    }

    /**
     * @return string
     */
    abstract protected function getUrl(): string;

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
     * @param string $requestMethod
     * @param string $body
     *
     * @throws \RoseBikesSpryker\Zed\ChannableApi\Business\Exception\ChannableApiHttpRequestException
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function sendRequest(string $requestMethod, string $body = ''): Response
    {
        $requestOptions['headers'] = [
            'Authorization' => 'Bearer ' . $this->config->getToken(),
        ];

        if (!empty($this->getQueryParameter())) {
            $requestOptions['query'] = $this->getQueryParameter();
        }

        if (!empty($body)) {
            $requestOptions['body'] = $body;
        }

        try {
            $response = $this->client->request(
                $requestMethod,
                $this->getUrl(),
                $requestOptions
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
