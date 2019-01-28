<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPermission
 *
 * @ORM\Table(name="user_permission")
 * @ORM\Entity
 */
class UserPermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userPermissionId;

    /**
     * @var bool
     *
     * @ORM\Column(name="read_access", type="boolean", nullable=false)
     */
    private $readAccess;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="write_access", type="boolean", nullable=true)
     */
    private $writeAccess;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="execute_access", type="boolean", nullable=true)
     */
    private $executeAccess;

    public function getUserPermissionId(): ?int
    {
        return $this->userPermissionId;
    }

    public function getReadAccess(): ?bool
    {
        return $this->readAccess;
    }

    public function setReadAccess(bool $readAccess): self
    {
        $this->readAccess = $readAccess;

        return $this;
    }

    public function getWriteAccess(): ?bool
    {
        return $this->writeAccess;
    }

    public function setWriteAccess(?bool $writeAccess): self
    {
        $this->writeAccess = $writeAccess;

        return $this;
    }

    public function getExecuteAccess(): ?bool
    {
        return $this->executeAccess;
    }

    public function setExecuteAccess(?bool $executeAccess): self
    {
        $this->executeAccess = $executeAccess;

        return $this;
    }


}
