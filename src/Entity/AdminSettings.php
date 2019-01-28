<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminSettings
 *
 * @ORM\Table(name="admin_settings", indexes={@ORM\Index(name="email_verification_expiry", columns={"email_verification_expiry"}), @ORM\Index(name="user_invitation_expiry", columns={"user_invitation_expiry"}), @ORM\Index(name="db_backup_id", columns={"db_backup_id"}), @ORM\Index(name="password_reset_expiry", columns={"password_reset_expiry"}), @ORM\Index(name="email_invite_expiry", columns={"email_invite_expiry"}), @ORM\Index(name="login_attempt_id", columns={"login_attempt_id"}), @ORM\Index(name="admin_user_id", columns={"admin_user_id"})})
 * @ORM\Entity
 */
class AdminSettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="setting_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $settingId;

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
     *   @ORM\JoinColumn(name="admin_user_id", referencedColumnName="user_id")
     * })
     */
    private $adminUser;

    /**
     * @var \TimestampSetting
     *
     * @ORM\ManyToOne(targetEntity="TimestampSetting")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="db_backup_id", referencedColumnName="timestamp_setting_id")
     * })
     */
    private $dbBackup;

    /**
     * @var \TimestampSetting
     *
     * @ORM\ManyToOne(targetEntity="TimestampSetting")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="password_reset_expiry", referencedColumnName="timestamp_setting_id")
     * })
     */
    private $passwordResetExpiry;

    /**
     * @var \TimestampSetting
     *
     * @ORM\ManyToOne(targetEntity="TimestampSetting")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_verification_expiry", referencedColumnName="timestamp_setting_id")
     * })
     */
    private $emailVerificationExpiry;

    /**
     * @var \TimestampSetting
     *
     * @ORM\ManyToOne(targetEntity="TimestampSetting")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_invite_expiry", referencedColumnName="timestamp_setting_id")
     * })
     */
    private $emailInviteExpiry;

    /**
     * @var \TimestampSetting
     *
     * @ORM\ManyToOne(targetEntity="TimestampSetting")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_invitation_expiry", referencedColumnName="timestamp_setting_id")
     * })
     */
    private $userInvitationExpiry;

    /**
     * @var \LoginAttempts
     *
     * @ORM\ManyToOne(targetEntity="LoginAttempts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_attempt_id", referencedColumnName="login_attempt_id")
     * })
     */
    private $loginAttempt;

    public function getSettingId(): ?int
    {
        return $this->settingId;
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

    public function getAdminUser(): ?UserDetails
    {
        return $this->adminUser;
    }

    public function setAdminUser(?UserDetails $adminUser): self
    {
        $this->adminUser = $adminUser;

        return $this;
    }

    public function getDbBackup(): ?TimestampSetting
    {
        return $this->dbBackup;
    }

    public function setDbBackup(?TimestampSetting $dbBackup): self
    {
        $this->dbBackup = $dbBackup;

        return $this;
    }

    public function getPasswordResetExpiry(): ?TimestampSetting
    {
        return $this->passwordResetExpiry;
    }

    public function setPasswordResetExpiry(?TimestampSetting $passwordResetExpiry): self
    {
        $this->passwordResetExpiry = $passwordResetExpiry;

        return $this;
    }

    public function getEmailVerificationExpiry(): ?TimestampSetting
    {
        return $this->emailVerificationExpiry;
    }

    public function setEmailVerificationExpiry(?TimestampSetting $emailVerificationExpiry): self
    {
        $this->emailVerificationExpiry = $emailVerificationExpiry;

        return $this;
    }

    public function getEmailInviteExpiry(): ?TimestampSetting
    {
        return $this->emailInviteExpiry;
    }

    public function setEmailInviteExpiry(?TimestampSetting $emailInviteExpiry): self
    {
        $this->emailInviteExpiry = $emailInviteExpiry;

        return $this;
    }

    public function getUserInvitationExpiry(): ?TimestampSetting
    {
        return $this->userInvitationExpiry;
    }

    public function setUserInvitationExpiry(?TimestampSetting $userInvitationExpiry): self
    {
        $this->userInvitationExpiry = $userInvitationExpiry;

        return $this;
    }

    public function getLoginAttempt(): ?LoginAttempts
    {
        return $this->loginAttempt;
    }

    public function setLoginAttempt(?LoginAttempts $loginAttempt): self
    {
        $this->loginAttempt = $loginAttempt;

        return $this;
    }


}
