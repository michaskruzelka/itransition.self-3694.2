<?php

declare(strict_types=1);

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ProductData
 *
 * @ORM\Entity
 * @ORM\Table(name="tblProductData")
 *
 * @author Michael Marchanka <m.marchenko@itransition.com>
 */
class ProductData
{
    /**
     * @var int
     *
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="intProductDataId")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="strProductName", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="strProductDesc", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="strProductCode", length=10, unique=true)
     */
    private $code;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", name="dtmAdded", nullable=true, options={"default": null})
     */
    private $addedAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", name="dtmDiscontinued", nullable=true, options={"default": null})
     */
    private $discontinuedAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", name="stmTimestamp", columnDefinition="timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     */
    private $stm;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getAddedAt(): DateTime
    {
        return $this->addedAt;
    }

    /**
     * @param DateTime $addedAt
     *
     * @return $this
     */
    public function setAddedAt(DateTime $addedAt): self
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDiscontinuedAt(): DateTime
    {
        return $this->discontinuedAt;
    }

    /**
     * @param DateTime $discontinuedAt
     *
     * @return $this
     */
    public function setDiscontinuedAt(DateTime $discontinuedAt): self
    {
        $this->discontinuedAt = $discontinuedAt;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getStm(): DateTime
    {
        return $this->stm;
    }

    /**
     * @param DateTime $stm
     *
     * @return $this
     */
    public function setStm(DateTime $stm): self
    {
        $this->stm = $stm;

        return $this;
    }
}
