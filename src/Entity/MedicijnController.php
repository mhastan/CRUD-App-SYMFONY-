<?php

namespace App\Entity;

use App\Repository\MedicijnControllerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnControllerRepository::class)
 */
class MedicijnController
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Werking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Bijwerking;

    /**
     * @ORM\Column(type="float")
     */
    private $Prijs;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $Verzekerd;

    /**
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="medicijn_id")
     */
    private $medicijn_id;

    public function __construct()
    {
        $this->medicijn_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getWerking(): ?string
    {
        return $this->Werking;
    }

    public function setWerking(string $Werking): self
    {
        $this->Werking = $Werking;

        return $this;
    }

    public function getBijwerking(): ?string
    {
        return $this->Bijwerking;
    }

    public function setBijwerking(string $Bijwerking): self
    {
        $this->Bijwerking = $Bijwerking;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->Prijs;
    }

    public function setPrijs(float $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    public function getVerzekerd(): ?int
    {
        return $this->Verzekerd;
    }

    public function setVerzekerd(string $Verzekerd): self
    {
        $this->Verzekerd = $Verzekerd;

        return $this;
    }

    /**
     * @return Collection|Recept[]
     */
    public function getMedicijnId(): Collection
    {
        return $this->medicijn_id;
    }

    public function addMedicijnId(Recept $medicijnId): self
    {
        if (!$this->medicijn_id->contains($medicijnId)) {
            $this->medicijn_id[] = $medicijnId;
            $medicijnId->setMedicijnId($this);
        }

        return $this;
    }

    public function removeMedicijnId(Recept $medicijnId): self
    {
        if ($this->medicijn_id->removeElement($medicijnId)) {
            // set the owning side to null (unless already changed)
            if ($medicijnId->getMedicijnId() === $this) {
                $medicijnId->setMedicijnId(null);
            }
        }

        return $this;
    }
}
