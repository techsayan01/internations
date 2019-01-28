<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatabaseVersion
 *
 * @ORM\Table(name="database_version")
 * @ORM\Entity
 */
class DatabaseVersion
{
    /**
     * @var int
     *
     * @ORM\Column(name="database_version_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $databaseVersionId;

    /**
     * @var string
     *
     * @ORM\Column(name="dump_location", type="string", length=100, nullable=false)
     */
    private $dumpLocation = '';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getDatabaseVersionId(): ?int
    {
        return $this->databaseVersionId;
    }

    public function getDumpLocation(): ?string
    {
        return $this->dumpLocation;
    }

    public function setDumpLocation(string $dumpLocation): self
    {
        $this->dumpLocation = $dumpLocation;

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
