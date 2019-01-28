<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApiLog
 *
 * @ORM\Table(name="api_log", indexes={@ORM\Index(name="audit_id", columns={"audit_id"}), @ORM\Index(name="audit_id_idx", columns={"audit_id"})})
 * @ORM\Entity
 */
class ApiLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="api_log_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $apiLogId;

    /**
     * @var string
     *
     * @ORM\Column(name="header_fields", type="string", length=500, nullable=false)
     */
    private $headerFields = '';

    /**
     * @var string
     *
     * @ORM\Column(name="request_payload", type="string", length=500, nullable=false)
     */
    private $requestPayload = '';

    /**
     * @var string
     *
     * @ORM\Column(name="response_payload", type="string", length=500, nullable=false)
     */
    private $responsePayload = '';

    /**
     * @var int
     *
     * @ORM\Column(name="response_status_code", type="integer", nullable=false)
     */
    private $responseStatusCode = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getApiLogId(): ?int
    {
        return $this->apiLogId;
    }

    public function getHeaderFields(): ?string
    {
        return $this->headerFields;
    }

    public function setHeaderFields(string $headerFields): self
    {
        $this->headerFields = $headerFields;

        return $this;
    }

    public function getRequestPayload(): ?string
    {
        return $this->requestPayload;
    }

    public function setRequestPayload(string $requestPayload): self
    {
        $this->requestPayload = $requestPayload;

        return $this;
    }

    public function getResponsePayload(): ?string
    {
        return $this->responsePayload;
    }

    public function setResponsePayload(string $responsePayload): self
    {
        $this->responsePayload = $responsePayload;

        return $this;
    }

    public function getResponseStatusCode(): ?int
    {
        return $this->responseStatusCode;
    }

    public function setResponseStatusCode(int $responseStatusCode): self
    {
        $this->responseStatusCode = $responseStatusCode;

        return $this;
    }

    public function getAuditId(): ?int
    {
        return $this->auditId;
    }

    public function setAuditId(int $auditId): self
    {
        $this->auditId = $auditId;

        return $this;
    }


}
