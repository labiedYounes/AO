<?php

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="situationMarche")
 */

class situationMarche {//suivi du marché
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $garantieParAn;
    protected $observation;
    /**
     * @ORM\OneToMany(targetEntity="etat", mappedBy="situationMarche")
     */
    protected $etats;
    /**
     * @ORM\OneToOne(targetEntity="marche", inversedBy="situationMarche")
     */
    protected $marche;
    /**
     * @ORM\OneToMany(targetEntity="caution", mappedBy="situationMarche")
     */
    protected $cautions;

     /**
     * @ORM\ManyToOne(targetEntity="modelEtats")
     */
    protected $modelEtats;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cautions = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Add etats
     *
     * @param \medaSys\AOBundle\Entity\etat $etats
     * @return situationMarche
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

    /**
     * Set marche
     *
     * @param \medaSys\AOBundle\Entity\appel $marche
     * @return situationMarche
     */
    public function setMarche(\medaSys\AOBundle\Entity\appel $marche = null)
    {
        $this->marche = $marche;

        return $this;
    }

    /**
     * Get marche
     *
     * @return \medaSys\AOBundle\Entity\appel 
     */
    public function getMarche()
    {
        return $this->marche;
    }

    /**
     * Add cautions
     *
     * @param \medaSys\AOBundle\Entity\caution $cautions
     * @return situationMarche
     */
    public function addCaution(\medaSys\AOBundle\Entity\caution $cautions)
    {
        $this->cautions[] = $cautions;

        return $this;
    }

    /**
     * Remove cautions
     *
     * @param \medaSys\AOBundle\Entity\caution $cautions
     */
    public function removeCaution(\medaSys\AOBundle\Entity\caution $cautions)
    {
        $this->cautions->removeElement($cautions);
    }

    /**
     * Get cautions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCautions()
    {
        return $this->cautions;
    }

    /**
     * Set modelEtats
     *
     * @param \medaSys\AOBundle\Entity\modelEtats $modelEtats
     * @return situationMarche
     */
    public function setModelEtats(\medaSys\AOBundle\Entity\modelEtats $modelEtats = null)
    {
        $this->modelEtats = $modelEtats;

        return $this;
    }

    /**
     * Get modelEtats
     *
     * @return \medaSys\AOBundle\Entity\modelEtats 
     */
    public function getModelEtats()
    {
        return $this->modelEtats;
    }
}
