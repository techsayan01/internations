<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDetails
 *
 * @ORM\Table(name="user_details", indexes={@ORM\Index(name="permission_id", columns={"permission_id"}), @ORM\Index(name="email_id", columns={"email_id"}), @ORM\Index(name="role_id", columns={"role_id"}), @ORM\Index(name="profile_pictue_id", columns={"profile_pictue_id"})})
 * @ORM\Entity
 */
class UserDetails
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=45, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=false)
     */
    private $phoneNumber = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="middle_name", type="string", length=45, nullable=true)
     */
    private $middleName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_1", type="string", length=45, nullable=true)
     */
    private $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_2", type="string", length=45, nullable=true)
     */
    private $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_3", type="string", length=45, nullable=true)
     */
    private $address3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_salt", type="string", length=45, nullable=true)
     */
    private $passwordSalt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_hash", type="string", length=45, nullable=true)
     */
    private $passwordHash;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_multiple_login", type="boolean", nullable=false)
     */
    private $allowMultipleLogin = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="jwt_secret", type="string", length=45, nullable=false)
     */
    private $jwtSecret;

    /**
     * @var int
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=false)
     */
    private $auditId = '0';

    /**
     * @var \Attachement
     *
     * @ORM\ManyToOne(targetEntity="Attachement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_pictue_id", referencedColumnName="attachement_id")
     * })
     */
    private $profilePictue;

    /**
     * @var \EmailDetail
     *
     * @ORM\ManyToOne(targetEntity="EmailDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_id", referencedColumnName="email_detail_id")
     * })
     */
    private $email;

    /**
     * @var \UserRole
     *
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="user_role_id")
     * })
     */
    private $role;

    /**
     * @var \UserRole
     *
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_id", referencedColumnName="user_role_id")
     * })
     */
    private $permission;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): self
    {
        $this->middleName = $middleName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getAddress3(): ?string
    {
        return $this->address3;
    }

    public function setAddress3(?string $address3): self
    {
        $this->address3 = $address3;

        return $this;
    }

    public function getPasswordSalt(): ?string
    {
        return $this->passwordSalt;
    }

    public function setPasswordSalt(?string $passwordSalt): self
    {
        $this->passwordSalt = $passwordSalt;

        return $this;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(?string $passwordHash): self
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    public function getAllowMultipleLogin(): ?bool
    {
        return $this->allowMultipleLogin;
    }

    public function setAllowMultipleLogin(bool $allowMultipleLogin): self
    {
        $this->allowMultipleLogin = $allowMultipleLogin;

        return $this;
    }

    public function getJwtSecret(): ?string
    {
        return $this->jwtSecret;
    }

    public function setJwtSecret(string $jwtSecret): self
    {
        $this->jwtSecret = $jwtSecret;

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

    public function getProfilePictue(): ?Attachement
    {
        return $this->profilePictue;
    }

    public function setProfilePictue(?Attachement $profilePictue): self
    {
        $this->profilePictue = $profilePictue;

        return $this;
    }

    public function getEmail(): ?EmailDetail
    {
        return $this->email;
    }

    public function setEmail(?EmailDetail $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?UserRole
    {
        return $this->role;
    }

    public function setRole(?UserRole $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPermission(): ?UserRole
    {
        return $this->permission;
    }

    public function setPermission(?UserRole $permission): self
    {
        $this->permission = $permission;

        return $this;
    }


}
