<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupdetails
 *
 * @ORM\Table(name="groupDetails")
 * @ORM\Entity
 */
class Groupdetails
{
    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=45, nullable=false)
     */
    private $groupName;

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

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
