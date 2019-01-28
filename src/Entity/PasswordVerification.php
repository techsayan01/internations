<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasswordVerification
 *
 * @ORM\Table(name="password_verification")
 * @ORM\Entity
 */
class PasswordVerification
{
    /**
     * @var int
     *
     * @ORM\Column(name="password_verification_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $passwordVerificationId;

    /**
     * @var string
     *
     * @ORM\Column(name="password_verification_hash", type="string", length=45, nullable=false)
     */
    private $passwordVerificationHash = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_verification_expiry", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $passwordVerificationExpiry = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getPasswordVerificationId(): ?int
    {
        return $this->passwordVerificationId;
    }

    public function getPasswordVerificationHash(): ?string
    {
        return $this->passwordVerificationHash;
    }

    public function setPasswordVerificationHash(string $passwordVerificationHash): self
    {
        $this->passwordVerificationHash = $passwordVerificationHash;

        return $this;
    }

    public function getPasswordVerificationExpiry(): ?\DateTimeInterface
    {
        return $this->passwordVerificationExpiry;
    }

    public function setPasswordVerificationExpiry(\DateTimeInterface $passwordVerificationExpiry): self
    {
        $this->passwordVerificationExpiry = $passwordVerificationExpiry;

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
