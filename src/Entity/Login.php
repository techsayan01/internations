<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity
 */
class Login
{
    /**
     * @var int
     *
     * @ORM\Column(name="login_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loginId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="login_attempt_id", type="integer", nullable=false)
     */
    private $loginAttemptId = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_logged_in", type="boolean", nullable=false)
     */
    private $isLoggedIn = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    public function getLoginId(): ?int
    {
        return $this->loginId;
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

    public function getLoginAttemptId(): ?int
    {
        return $this->loginAttemptId;
    }

    public function setLoginAttemptId(int $loginAttemptId): self
    {
        $this->loginAttemptId = $loginAttemptId;

        return $this;
    }

    public function getIsLoggedIn(): ?bool
    {
        return $this->isLoggedIn;
    }

    public function setIsLoggedIn(bool $isLoggedIn): self
    {
        $this->isLoggedIn = $isLoggedIn;

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
