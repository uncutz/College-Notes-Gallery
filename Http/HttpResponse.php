<?php

namespace Http;

use JsonException;

class HttpResponse
{

    /** @var int */
    private $statusCode;
    /** @var array<string, string> */
    private $headers;
    /** @var string */
    private $body;

    /**
     * @param int $statusCode
     * @param array $headers
     * @param string|null $body
     */
    public function __construct(int $statusCode = 200, array $headers = [], string $body = null)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param StatusCodeMessages $statusCode
     */
    public function setStatusCode(StatusCodeMessages $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return HttpResponse
     */
    public function setBody($body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @throws JsonException
     */
    public function withJson(): self
    {
        $this->body = json_encode($this->body, JSON_THROW_ON_ERROR);
        return $this;
    }

}