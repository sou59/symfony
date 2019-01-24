<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCommand
 *
 * @ORM\Table(name="detail_command")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailCommandRepository")
 */
class DetailCommand
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
     * @ORM\Column(name="nombeer", type="string", length=255)
     */
    private $nombeer;

    /**
     * @var float
     *
     * @ORM\Column(name="pricebeer", type="float")
     */
    private $pricebeer;

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
     * @return DetailCommand
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
     * Set nombeer
     *
     * @param string $nombeer
     *
     * @return DetailCommand
     */
    public function setNombeer($nombeer)
    {
        $this->nombeer = $nombeer;

        return $this;
    }

    /**
     * Get nombeer
     *
     * @return string
     */
    public function getNombeer()
    {
        return $this->nombeer;
    }

    /**
     * Set pricebeer
     *
     * @param float $pricebeer
     *
     * @return DetailCommand
     */
    public function setPricebeer($pricebeer)
    {
        $this->pricebeer = $pricebeer;

        return $this;
    }

    /**
     * Get pricebeer
     *
     * @return float
     */
    public function getPricebeer()
    {
        return $this->pricebeer;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return DetailCommand
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
     * @return DetailCommand
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
        $this->users = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="command")
     */
    private $users;



    /**
     * Add beer
     *
     * @param \AppBundle\Entity\Beer $beer
     *
     * @return DetailCommand
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

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return DetailCommand
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
