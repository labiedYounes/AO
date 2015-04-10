<?php


namespace medaSys\AOBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="modelEtats")
 * @ORM\Entity(repositoryClass="medaSys\AOBundle\Entity\modelEtatsRepository")
 */
class modelEtats{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $isDefault;

    /**
     * @ORM\Column(type="string", length=100 )
     */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="etat", mappedBy="modelEtats")
     */
    protected $etats;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etats = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set isDefault
     *
     * @param boolean $isDefault
     * @return modelEtats
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Add etats
     *
     * @param \medaSys\AOBundle\Entity\etat $etats
     * @return modelEtats
     */
    public function addEtat(\medaSys\AOBundle\Entity\etat $etats)
    {
        $this->etats[] = $etats;

        return $this;
    }

    /**
     * Remove etats
     *
     * @param \medaSys\AOBundle\Entity\etat $etats
     */
    public function removeEtat(\medaSys\AOBundle\Entity\etat $etats)
    {
        $this->etats->removeElement($etats);
    }

    /**
     * Get etats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtats()
    {
        return $this->etats;
    }
}
