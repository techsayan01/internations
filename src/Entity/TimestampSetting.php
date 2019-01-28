<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimestampSetting
 *
 * @ORM\Table(name="timestamp_setting")
 * @ORM\Entity
 */
class TimestampSetting
{
    /**
     * @var int
     *
     * @ORM\Column(name="timestamp_setting_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $timestampSettingId;

    /**
     * @var int
     *
     * @ORM\Column(name="min", type="integer", nullable=false)
     */
    private $min = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hour", type="integer", nullable=false)
     */
    private $hour = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="day", type="integer", nullable=false)
     */
    private $day = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="month", type="string", length=45, nullable=false)
     */
    private $month = '';

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="audit_id", type="integer", nullable=true)
     */
    private $auditId;

    public function getTimestampSettingId(): ?int
    {
        return $this->timestampSettingId;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getHour(): ?int
    {
        return $this->hour;
    }

    public function setHour(int $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(string $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getAuditId(): ?int
    {
        return $this->auditId;
    }

    public function setAuditId(?int $auditId): self
    {
        $this->auditId = $auditId;

        return $this;
    }


}
