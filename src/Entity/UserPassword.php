<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPassword
 *
 * @ORM\Table(name="user_password")
 * @ORM\Entity
 */
class UserPassword
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_password_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userPasswordId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_answer", type="string", length=45, nullable=true)
     */
    private $passwordAnswer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_quesiton", type="string", length=45, nullable=true)
     */
    private $passwordQuesiton;

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

    public function getUserPasswordId(): ?int
    {
        return $this->userPasswordId;
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

    public function getPasswordAnswer(): ?string
    {
        return $this->passwordAnswer;
    }

    public function setPasswordAnswer(?string $passwordAnswer): self
    {
        $this->passwordAnswer = $passwordAnswer;

        return $this;
    }

    public function getPasswordQuesiton(): ?string
    {
        return $this->passwordQuesiton;
    }

    public function setPasswordQuesiton(?string $passwordQuesiton): self
    {
        $this->passwordQuesiton = $passwordQuesiton;

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
