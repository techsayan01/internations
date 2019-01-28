<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupDetails
 *
 * @ORM\Table(name="group_details", indexes={@ORM\Index(name="group_admin_user_id", columns={"group_admin_user_id"})})
 * @ORM\Entity
 */
class GroupDetails
{
    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="group_pic_id", type="integer", nullable=true)
     */
    private $groupPicId;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=45, nullable=false)
     */
    private $groupName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="group_type", type="string", length=45, nullable=true)
     */
    private $groupType;

    /**
     * @var string
     *
     * @ORM\Column(name="audit_id", type="string", length=45, nullable=false)
     */
    private $auditId;

    /**
     * @var \UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_admin_user_id", referencedColumnName="user_id")
     * })
     */
    private $groupAdminUser;

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getGroupPicId(): ?int
    {
        return $this->groupPicId;
    }

    public function setGroupPicId(?int $groupPicId): self
    {
        $this->groupPicId = $groupPicId;

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getGroupType(): ?string
    {
        return $this->groupType;
    }

    public function setGroupType(?string $groupType): self
    {
        $this->groupType = $groupType;

        return $this;
    }

    public function getAuditId(): ?string
    {
        return $this->auditId;
    }

    public function setAuditId(string $auditId): self
    {
        $this->auditId = $auditId;

        return $this;
    }

    public function getGroupAdminUser(): ?UserDetails
    {
        return $this->groupAdminUser;
    }

    public function setGroupAdminUser(?UserDetails $groupAdminUser): self
    {
        $this->groupAdminUser = $groupAdminUser;

        return $this;
    }


}
