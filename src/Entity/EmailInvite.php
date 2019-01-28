<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailInvite
 *
 * @ORM\Table(name="email_invite", indexes={@ORM\Index(name="email_id", columns={"email_id"}), @ORM\Index(name="invited_by_user_id", columns={"invited_by_user_id"})})
 * @ORM\Entity
 */
class EmailInvite
{
    /**
     * @var int
     *
     * @ORM\Column(name="email_invite_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailInviteId;

    /**
     * @var string
     *
     * @ORM\Column(name="invite_hash", type="string", length=45, nullable=false)
     */
    private $inviteHash = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invite_expiry", type="string", length=45, nullable=true)
     */
    private $inviteExpiry = '';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    /**
     * @var \UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invited_by_user_id", referencedColumnName="user_id")
     * })
     */
    private $invitedByUser;

    /**
     * @var \EmailDetail
     *
     * @ORM\ManyToOne(targetEntity="EmailDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_id", referencedColumnName="email_detail_id")
     * })
     */
    private $email;

    public function getEmailInviteId(): ?int
    {
        return $this->emailInviteId;
    }

    public function getInviteHash(): ?string
    {
        return $this->inviteHash;
    }

    public function setInviteHash(string $inviteHash): self
    {
        $this->inviteHash = $inviteHash;

        return $this;
    }

    public function getInviteExpiry(): ?string
    {
        return $this->inviteExpiry;
    }

    public function setInviteExpiry(?string $inviteExpiry): self
    {
        $this->inviteExpiry = $inviteExpiry;

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

    public function getInvitedByUser(): ?UserDetails
    {
        return $this->invitedByUser;
    }

    public function setInvitedByUser(?UserDetails $invitedByUser): self
    {
        $this->invitedByUser = $invitedByUser;

        return $this;
    }

    public function getEmail(): ?EmailDetail
    {
        return $this->email;
    }

    public function setEmail(?EmailDetail $email): self
    {
        $this->email = $email;

        return $this;
    }


}
