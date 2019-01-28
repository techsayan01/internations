<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupPermissionMapping
 *
 * @ORM\Table(name="group_permission_mapping", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="group_id", columns={"group_id"})})
 * @ORM\Entity
 */
class GroupPermissionMapping
{
    /**
     * @var int
     *
     * @ORM\Column(name="group_permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupPermissionId;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_admin", type="boolean", nullable=false)
     */
    private $isAdmin;

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    /**
     * @var \GroupDetails
     *
     * @ORM\ManyToOne(targetEntity="GroupDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="group_id")
     * })
     */
    private $group;

    /**
     * @var \UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    public function getGroupPermissionId(): ?int
    {
        return $this->groupPermissionId;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

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

    public function getGroup(): ?GroupDetails
    {
        return $this->group;
    }

    public function setGroup(?GroupDetails $group): self
    {
        $this->group = $group;

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
