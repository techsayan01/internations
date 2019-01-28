<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachement
 *
 * @ORM\Table(name="attachement")
 * @ORM\Entity
 */
class Attachement
{
    /**
     * @var int
     *
     * @ORM\Column(name="attachement_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attachementId;

    /**
     * @var string
     *
     * @ORM\Column(name="mime_type", type="string", length=45, nullable=false)
     */
    private $mimeType = '';

    /**
     * @var string
     *
     * @ORM\Column(name="original_file_name", type="string", length=100, nullable=false)
     */
    private $originalFileName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="versioned_file_name", type="string", length=100, nullable=false)
     */
    private $versionedFileName = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=true)
     */
    private $auditId;

    public function getAttachementId(): ?int
    {
        return $this->attachementId;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getOriginalFileName(): ?string
    {
        return $this->originalFileName;
    }

    public function setOriginalFileName(string $originalFileName): self
    {
        $this->originalFileName = $originalFileName;

        return $this;
    }

    public function getVersionedFileName(): ?string
    {
        return $this->versionedFileName;
    }

    public function setVersionedFileName(string $versionedFileName): self
    {
        $this->versionedFileName = $versionedFileName;

        return $this;
    }

    public function getAuditId(): ?int
    {
        return $this->auditId;
    }

    public function setAuditId(?int $auditId): self
    {
        $this->auditId = $auditId;

        return $this;
    }


}
