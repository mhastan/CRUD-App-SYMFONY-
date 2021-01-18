<?php

namespace App\Entity;


use App\Repository\ReceptRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReceptRepository::class)
 */
class Recept
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dosis;

    /**
     * @ORM\ManyToOne(targetEntity=MedicijnController::class, inversedBy="medicijn_id")
     */
    private $medicijn_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getDuur(): ?string
    {
        return $this->duur;
    }

    public function setDuur(string $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getDosis(): ?string
    {
        return $this->dosis;
    }

    public function setDosis(string $dosis): self
    {
        $this->dosis = $dosis;

        return $this;
    }

    public function getMedicijnId(): ?MedicijnController
    {
        return $this->medicijn_id;
    }

    public function setMedicijnId(?MedicijnController $medicijn_id): self
    {
        $this->medicijn_id = $medicijn_id;

        return $this;
    }
}
