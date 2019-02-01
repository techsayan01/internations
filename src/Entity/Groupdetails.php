<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupDetails
 *
 * @ORM\Table(name="group_details", uniqueConstraints={@ORM\UniqueConstraint(name="group_name", columns={"group_name"})})
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
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=45, nullable=false)
     */
    private $groupName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $createdAt = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="updated_at", type="string", length=45, nullable=false, options={"default"="CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted = '0';

    public function getGroupId(): ?int
    {
        return $this->groupId;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }


}
