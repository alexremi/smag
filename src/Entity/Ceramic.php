<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CeramicRepository")
 */
class Ceramic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CeramicCategory", inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ceramicCategory;

    public function getId(): ?int
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCeramicCategory(): ?CeramicCategory
    {
        return $this->ceramicCategory;
    }

    public function setCeramicCategory(?CeramicCategory $ceramicCategory): self
    {
        $this->ceramicCategory = $ceramicCategory;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
