<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserToUserMapping
 *
 * @ORM\Table(name="user_to_user_mapping", indexes={@ORM\Index(name="invitation_status", columns={"invitation_status"})})
 * @ORM\Entity
 */
class UserToUserMapping
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_mapping_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userMappingId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="user_created_by", type="integer", nullable=false)
     */
    private $userCreatedBy = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invitation_expiry", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $invitationExpiry = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId = '0';

    /**
     * @var \InvitationStatus
     *
     * @ORM\ManyToOne(targetEntity="InvitationStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invitation_status", referencedColumnName="invitationstatus_id")
     * })
     */
    private $invitationStatus;

    public function getUserMappingId(): ?int
    {
        return $this->userMappingId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserCreatedBy(): ?int
    {
        return $this->userCreatedBy;
    }

    public function setUserCreatedBy(int $userCreatedBy): self
    {
        $this->userCreatedBy = $userCreatedBy;

        return $this;
    }

    public function getInvitationExpiry(): ?\DateTimeInterface
    {
        return $this->invitationExpiry;
    }

    public function setInvitationExpiry(\DateTimeInterface $invitationExpiry): self
    {
        $this->invitationExpiry = $invitationExpiry;

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

    public function getInvitationStatus(): ?InvitationStatus
    {
        return $this->invitationStatus;
    }

    public function setInvitationStatus(?InvitationStatus $invitationStatus): self
    {
        $this->invitationStatus = $invitationStatus;

        return $this;
    }


}
