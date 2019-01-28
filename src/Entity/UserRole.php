<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @ORM\Table(name="user_role", uniqueConstraints={@ORM\UniqueConstraint(name="user_type_UNIQUE", columns={"user_type"})})
 * @ORM\Entity
 */
class UserRole
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userRoleId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=45, nullable=false)
     */
    private $userType;

    /**
     * @var int
     *
     * @ORM\Column(name="user_permission_id", type="integer", nullable=false)
     */
    private $userPermissionId = '0';

    public function getUserRoleId(): ?int
    {
        return $this->userRoleId;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function getUserPermissionId(): ?int
    {
        return $this->userPermissionId;
    }

    public function setUserPermissionId(int $userPermissionId): self
    {
        $this->userPermissionId = $userPermissionId;

        return $this;
    }


}
