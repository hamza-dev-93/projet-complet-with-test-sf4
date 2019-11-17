<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Advert", mappedBy="author")
     */
    private $advert;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Aplications", mappedBy="author")
     */
    private $aplications;

    public function __construct()
    {
        $this->advert = new ArrayCollection();
        $this->aplications = new ArrayCollection();
    }

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdvert(): Collection
    {
        return $this->advert;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->advert->contains($advert)) {
            $this->advert[] = $advert;
            $advert->setAuthor($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->advert->contains($advert)) {
            $this->advert->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getAuthor() === $this) {
                $advert->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Aplications[]
     */
    public function getAplications(): Collection
    {
        return $this->aplications;
    }

    public function addAplication(Aplications $aplication): self
    {
        if (!$this->aplications->contains($aplication)) {
            $this->aplications[] = $aplication;
            $aplication->setAuthor($this);
        }

        return $this;
    }

    public function removeAplication(Aplications $aplication): self
    {
        if ($this->aplications->contains($aplication)) {
            $this->aplications->removeElement($aplication);
            // set the owning side to null (unless already changed)
            if ($aplication->getAuthor() === $this) {
                $aplication->setAuthor(null);
            }
        }

        return $this;
    }

    /**
    * toString
    * @return string
    */
   public function __toString()
   {
           return $this->getName();
   }
}
