<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailVerification
 *
 * @ORM\Table(name="email_verification")
 * @ORM\Entity
 */
class EmailVerification
{
    /**
     * @var int
     *
     * @ORM\Column(name="email_verification_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailVerificationId;

    /**
     * @var string
     *
     * @ORM\Column(name="email_verification_hash", type="string", length=45, nullable=false)
     */
    private $emailVerificationHash = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Email_verification_expiry", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $emailVerificationExpiry = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getEmailVerificationId(): ?int
    {
        return $this->emailVerificationId;
    }

    public function getEmailVerificationHash(): ?string
    {
        return $this->emailVerificationHash;
    }

    public function setEmailVerificationHash(string $emailVerificationHash): self
    {
        $this->emailVerificationHash = $emailVerificationHash;

        return $this;
    }

    public function getEmailVerificationExpiry(): ?\DateTimeInterface
    {
        return $this->emailVerificationExpiry;
    }

    public function setEmailVerificationExpiry(\DateTimeInterface $emailVerificationExpiry): self
    {
        $this->emailVerificationExpiry = $emailVerificationExpiry;

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
