<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailDetail
 *
 * @ORM\Table(name="email_detail", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class EmailDetail
{
    /**
     * @var int
     *
     * @ORM\Column(name="email_detail_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailDetailId;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=45, nullable=false)
     */
    private $emailAddress;

    /**
     * @var int|null
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=true)
     */
    private $auditId;

    /**
     * @var \UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    public function getEmailDetailId(): ?int
    {
        return $this->emailDetailId;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

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

    public function getUser(): ?UserDetails
    {
        return $this->user;
    }

    public function setUser(?UserDetails $user): self
    {
        $this->user = $user;

        return $this;
    }


}
