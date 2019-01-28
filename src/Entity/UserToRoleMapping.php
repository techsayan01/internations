<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserToRoleMapping
 *
 * @ORM\Table(name="user_to_role_mapping")
 * @ORM\Entity
 */
class UserToRoleMapping
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_to_role_mapping_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userToRoleMappingId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    private $roleId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId = '0';

    public function getUserToRoleMappingId(): ?int
    {
        return $this->userToRoleMappingId;
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

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): self
    {
        $this->roleId = $roleId;

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
