<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandRepository")
 */
class Command
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomuser", type="string", length=255)
     */
    private $nomuser;

    /**
     * @var string
     *
     * @ORM\Column(name="nombiere", type="string", length=255)
     */
    private $nombiere;

    /**
     * @var float
     *
     * @ORM\Column(name="pricebiere", type="float")
     */
    private $pricebiere;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomuser
     *
     * @param string $nomuser
     *
     * @return Command
     */
    public function setNomuser($nomuser)
    {
        $this->nomuser = $nomuser;

        return $this;
    }

    /**
     * Get nomuser
     *
     * @return string
     */
    public function getNomuser()
    {
        return $this->nomuser;
    }

    /**
     * Set nombiere
     *
     * @param string $nombiere
     *
     * @return Command
     */
    public function setNombiere($nombiere)
    {
        $this->nombiere = $nombiere;

        return $this;
    }

    /**
     * Get nombiere
     *
     * @return string
     */
    public function getNombiere()
    {
        return $this->nombiere;
    }

    /**
     * Set pricebiere
     *
     * @param float $pricebiere
     *
     * @return Command
     */
    public function setPricebiere($pricebiere)
    {
        $this->pricebiere = $pricebiere;

        return $this;
    }

    /**
     * Get pricebiere
     *
     * @return float
     */
    public function getPricebiere()
    {
        return $this->pricebiere;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Command
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Command
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @ORM\OneToMany(targetEntity="Beer", mappedBy="command")
     */
    private $beers;

    public function __construct()
    {
        $this->beers = new ArrayCollection();
    }

    /**
     * Add beer
     *
     * @param \AppBundle\Entity\Beer $beer
     *
     * @return Category
     */
    public function addBeer(\AppBundle\Entity\Beer $beer)
    {
        $this->beers[] = $beer;

        return $this;
    }

    /**
     * Remove beer
     *
     * @param \AppBundle\Entity\Beer $beer
     */
    public function removeBeer(\AppBundle\Entity\Beer $beer)
    {
        $this->beers->removeElement($beer);
    }

    /**
     * Get beers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBeers()
    {
        return $this->beers;
    }


}
