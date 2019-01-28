<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginAttempts
 *
 * @ORM\Table(name="login_attempts")
 * @ORM\Entity
 */
class LoginAttempts
{
    /**
     * @var int
     *
     * @ORM\Column(name="login_attempt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loginAttemptId;

    /**
     * @var int
     *
     * @ORM\Column(name="login_attempt_number", type="integer", nullable=false, options={"default"="3"})
     */
    private $loginAttemptNumber = '3';

    /**
     * @var int
     *
     * @ORM\Column(name="created_by_user_id", type="integer", nullable=false)
     */
    private $createdByUserId;

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getLoginAttemptId(): ?int
    {
        return $this->loginAttemptId;
    }

    public function getLoginAttemptNumber(): ?int
    {
        return $this->loginAttemptNumber;
    }

    public function setLoginAttemptNumber(int $loginAttemptNumber): self
    {
        $this->loginAttemptNumber = $loginAttemptNumber;

        return $this;
    }

    public function getCreatedByUserId(): ?int
    {
        return $this->createdByUserId;
    }

    public function setCreatedByUserId(int $createdByUserId): self
    {
        $this->createdByUserId = $createdByUserId;

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
