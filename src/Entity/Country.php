<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=45, nullable=false)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=45, nullable=false)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="audit_id", type="string", length=45, nullable=false)
     */
    private $auditId;

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(string $countryName): self
    {
        $this->countryName = $countryName;

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


}
