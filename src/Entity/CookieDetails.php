<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CookieDetails
 *
 * @ORM\Table(name="cookie_details", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class CookieDetails
{
    /**
     * @var int
     *
     * @ORM\Column(name="cookie_detail_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cookieDetailId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cookie_value", type="text", length=65535, nullable=true)
     */
    private $cookieValue;

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId;

    /**
     * @var \UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    public function getCookieDetailId(): ?int
    {
        return $this->cookieDetailId;
    }

    public function getCookieValue(): ?string
    {
        return $this->cookieValue;
    }

    public function setCookieValue(?string $cookieValue): self
    {
        $this->cookieValue = $cookieValue;

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
