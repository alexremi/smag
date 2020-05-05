<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FarforRepository")
 */
class Farfor
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
     * @ORM\ManyToOne(targetEntity="App\Entity\FarforCategory", inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $farforCategory;

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

    public function getFarforCategory(): ?FarforCategory
    {
        return $this->farforCategory;
    }

    public function setFarforCategory(?FarforCategory $farforCategory): self
    {
        $this->farforCategory = $farforCategory;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
