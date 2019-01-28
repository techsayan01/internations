<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvitationStatus
 *
 * @ORM\Table(name="invitation_status")
 * @ORM\Entity
 */
class InvitationStatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="invitationstatus_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $invitationstatusId;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    public function getInvitationstatusId(): ?int
    {
        return $this->invitationstatusId;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }


}
