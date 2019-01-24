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
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

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
     * @ORM\OneToMany(targetEntity="DetailCommand", mappedBy="command")
     */
    private $detailcommand;

    public function __construct()
    {
        $this->detailcommand = new ArrayCollection();
    }


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="command")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
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
     * Add detailcommand
     *
     * @param \AppBundle\Entity\DetailCommand $detailcommand
     *
     * @return Command
     */
    public function addDetailcommand(\AppBundle\Entity\DetailCommand $detailcommand)
    {
        $this->detailcommand[] = $detailcommand;

        return $this;
    }

    /**
     * Remove detailcommand
     *
     * @param \AppBundle\Entity\DetailCommand $detailcommand
     */
    public function removeDetailcommand(\AppBundle\Entity\DetailCommand $detailcommand)
    {
        $this->detailcommand->removeElement($detailcommand);
    }

    /**
     * Get detailcommand
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetailcommand()
    {
        return $this->detailcommand;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Command
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
