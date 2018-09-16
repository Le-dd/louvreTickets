<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as BookingAssert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $country;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime
     * @BookingAssert\MonthBirthDate
     */
    private $birthDate;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rate", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, name="rate_id")
     */
    private $rateId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, name="type_id")
     * @Assert\NotBlank
     * @BookingAssert\ValidateTime
     */
    private $typeId;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime
     * @BookingAssert\ValideDate
     * @BookingAssert\NumberVisit
     */
    private $visitDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tokenCb;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;


        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {

        $this->birthDate = $birthDate;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getRateId(): ?Rate
    {
        return $this->rateId;
    }

    public function setRateId(Rate $rateId): self
    {
        $this->rateId = $rateId;

        return $this;
    }

    public function getTypeId(): ?Type
    {
        return $this->typeId;
    }

    public function setTypeId(Type $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getVisitDate(): ?\DateTimeInterface
    {
        return $this->visitDate;
    }

    public function setVisitDate(\DateTimeInterface $visitDate): self
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    public function getTokenCb(): ?string
    {
        return $this->tokenCb;
    }

    public function setTokenCb(string $tokenCb): self
    {
        $this->tokenCb = $tokenCb;

        return $this;
    }
}
