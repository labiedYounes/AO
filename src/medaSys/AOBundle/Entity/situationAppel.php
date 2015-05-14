<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="situationAppel")
 * $ORM\EntityListeners({"situationAppelListener"})
 */

class situationAppel {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $numOrder="test";
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $resultas="test";
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $responsableCompte="test";
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $responsableQualification="test";//oneToOne unidirectionnale
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $montantMarche=1;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $montantSoumission=1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $lot=1;
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $dateSoumission;
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $dateVisiteLieux;
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $observation="test";
    /**
     * @ORM\OneToMany(targetEntity="etat", mappedBy="situationAppel", cascade={"persist","remove"})
     */
    protected $etats;
    /**
     * @ORM\OneToOne(targetEntity="appel", inversedBy="situationAppel")
     */
    protected $appel;//oneToOne bidirectionnale
    /**
     * @ORM\OneToMany(targetEntity="caution", mappedBy="situationAppel")
     */
    protected $cautions;//oneToMany bidirectionnale
    /**
     * @ORM\ManyToOne(targetEntity="modelEtats")
     */
    protected $modelEtats;
    /**
     * @ORM\oneToOne(targetEntity="suiviPlis",inversedBy="situationAppel")
     */
    protected $suiviPlis;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cautions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateSoumission=new \DateTime();
        $this->dateVisiteLieux=new \DateTime();

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
     * Set numOrder
     *
     * @param string $numOrder
     * @return situationAppel
     */
    public function setNumOrder($numOrder)
    {
        $this->numOrder = $numOrder;

        return $this;
    }

    /**
     * Get numOrder
     *
     * @return string
     */
    public function getNumOrder()
    {
        return $this->numOrder;
    }

    /**
     * Set resultas
     *
     * @param string $resultas
     * @return situationAppel
     */
    public function setResultas($resultas)
    {
        $this->resultas = $resultas;

        return $this;
    }

    /**
     * Get resultas
     *
     * @return string
     */
    public function getResultas()
    {
        return $this->resultas;
    }

    /**
     * Set responsableCompte
     *
     * @param string $responsableCompte
     * @return situationAppel
     */
    public function setResponsableCompte($responsableCompte)
    {
        $this->responsableCompte = $responsableCompte;

        return $this;
    }

    /**
     * Get responsableCompte
     *
     * @return string
     */
    public function getResponsableCompte()
    {
        return $this->responsableCompte;
    }

    /**
     * Set responsableQualification
     *
     * @param string $responsableQualification
     * @return situationAppel
     */
    public function setResponsableQualification($responsableQualification)
    {
        $this->responsableQualification = $responsableQualification;

        return $this;
    }

    /**
     * Get responsableQualification
     *
     * @return string
     */
    public function getResponsableQualification()
    {
        return $this->responsableQualification;
    }

    /**
     * Set montantMarche
     *
     * @param integer $montantMarche
     * @return situationAppel
     */
    public function setMontantMarche($montantMarche)
    {
        $this->montantMarche = $montantMarche;

        return $this;
    }

    /**
     * Get montantMarche
     *
     * @return integer
     */
    public function getMontantMarche()
    {
        return $this->montantMarche;
    }

    /**
     * Set lot
     *
     * @param integer $lot
     * @return situationAppel
     */
    public function setLot($lot)
    {
        $this->lot = $lot;

        return $this;
    }

    /**
     * Get lot
     *
     * @return integer
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * Set dateSoumission
     *
     * @param \datetime $dateSoumission
     * @return situationAppel
     */
    public function setDateSoumission(\datetime $dateSoumission)
    {
        $this->dateSoumission = $dateSoumission;

        return $this;
    }

    /**
     * Get dateSoumission
     *
     * @return \datetime
     */
    public function getDateSoumission()
    {
        return $this->dateSoumission;
    }
    public function setDateVisiteLieux(\datetime $dateVisiteLieux)
    {
        $this->dateVisiteLieux = $dateVisiteLieux;

        return $this;
    }

    /**
     * Get dateSoumission
     *
     * @return \datetime
     */
    public function getDateVisiteLieux()
    {
        return $this->dateVisiteLieux;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return situationAppel
     */
    public function setObservation( $observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Add etats
     *
     * @param \medaSys\AOBundle\Entity\etat $etats
     * @return situationAppel
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
     * Set appel
     *
     * @param \medaSys\AOBundle\Entity\appel $appel
     * @return situationAppel
     */
    public function setAppel(\medaSys\AOBundle\Entity\appel $appel = null)
    {
        $this->appel = $appel;

        return $this;
    }

    /**
     * Get appel
     *
     * @return \medaSys\AOBundle\Entity\appel
     */
    public function getAppel()
    {
        return $this->appel;
    }

    /**
     * Add cautions
     *
     * @param \medaSys\AOBundle\Entity\caution $cautions
     * @return situationAppel
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
     * @return situationAppel
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

    /**
     * Set montantSoumission
     *
     * @param integer $montantSoumission
     * @return situationAppel
     */
    public function setMontantSoumission($montantSoumission)
    {
        $this->montantSoumission = $montantSoumission;

        return $this;
    }

    /**
     * Get montantSoumission
     *
     * @return integer 
     */
    public function getMontantSoumission()
    {
        return $this->montantSoumission;
    }
    public function setsuiviPlis(\medaSys\AOBundle\Entity\suiviPlis $suiviPlis)
    {
        $this->suiviPlis = $suiviPlis;

        return $this;
    }

    /**
     * Get situationAppel
     *
     * @return \medaSys\AOBundle\Entity\suiviPlis
     */
    public function getSuiviPlis()
    {
        return $this->suiviPlis;
    }

    /**
     * Set suiviPlis
     *
     * @param \medaSys\AOBundle\Entity\suiviPlis $suiviPlis
     * @return situationAppel
     */

}
