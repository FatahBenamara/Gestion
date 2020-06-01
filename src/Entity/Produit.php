<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="float")
     */
    private $pa;

    /**
     * @ORM\Column(type="float")
     */
    private $pv;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=Lcommande::class, mappedBy="produit", orphanRemoval=true)
     */
    private $lcommandes;

    public function __construct()
    {
        $this->lcommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPa(): ?float
    {
        return $this->pa;
    }

    public function setPa(float $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getPv(): ?float
    {
        return $this->pv;
    }

    public function setPv(float $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|Lcommande[]
     */
    public function getLcommandes(): Collection
    {
        return $this->lcommandes;
    }

    public function addLcommande(Lcommande $lcommande): self
    {
        if (!$this->lcommandes->contains($lcommande)) {
            $this->lcommandes[] = $lcommande;
            $lcommande->setProduit($this);
        }

        return $this;
    }

    public function removeLcommande(Lcommande $lcommande): self
    {
        if ($this->lcommandes->contains($lcommande)) {
            $this->lcommandes->removeElement($lcommande);
            // set the owning side to null (unless already changed)
            if ($lcommande->getProduit() === $this) {
                $lcommande->setProduit(null);
            }
        }

        return $this;
    }
}
