<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="situationAppel")
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
     * @Assert\NotBlank
     */
    protected $numOrder;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank
     */
    protected $resultas;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank
     */
    protected $responsableCompte;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank
     */
    protected $responsableQualification;//oneToOne unidirectionnale
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     */
    protected $montantMarche=1;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     */
    protected $montantSoumission=1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     * @Assert\Regex("/\d+/") => options (pattern, match, message)
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
    protected $observation;
    /**
     * @ORM\OneToOne(targetEntity="appel", inversedBy="situationAppel")
     */
    protected $appel;//oneToOne bidirectionnale
    /**
     * @ORM\OneToMany(targetEntity="caution", mappedBy="situationAppel")
     */
    protected $cautions;//oneToMany bidirectionnale

    /**
     * @ORM\oneToOne(targetEntity="suiviPlis",inversedBy="situationAppel",cascade={"persist"})
     */
    protected $suiviPlis;

// new --------------
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $installation;
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $siteConcernes;
    /**
     * @ORM\Column(type="text",nullable=true)
     * @Assert\NotBlank
     */
    protected $qualificationTechnique;
    /**
     * @ORM\Column(type="text",nullable=true)
     * @Assert\NotBlank
     *
     */
    protected $modeAdjudication;

    /**
     * @ORM\Column(type="text",nullable=true)
     * @Assert\NotBlank
     */
    protected $soumission;
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $motifs;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $dureeGarentie;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $delaiExection;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $penalites;






    /**
     * Constructor
     */
    public function __construct()
    {
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
        $cautions->setSituationAppel($this);
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
     * Set installation
     *
     * @param string $installation
     * @return situationAppel
     */
    public function setInstallation($installation)
    {
        $this->installation = $installation;

        return $this;
    }

    /**
     * Get installation
     *
     * @return string
     */
    public function getInstallation()
    {
        return $this->installation;
    }

    /**
     * Set siteConcernes
     *
     * @param string $siteConcernes
     * @return situationAppel
     */
    public function setSiteConcernes($siteConcernes)
    {
        $this->siteConcernes = $siteConcernes;

        return $this;
    }

    /**
     * Get siteConcernes
     *
     * @return string
     */
    public function getSiteConcernes()
    {
        return $this->siteConcernes;
    }

    /**
     * Set qualificationTechnique
     *
     * @param string $qualificationTechnique
     * @return situationAppel
     */
    public function setQualificationTechnique($qualificationTechnique)
    {
        $this->qualificationTechnique = $qualificationTechnique;

        return $this;
    }

    /**
     * Get qualificationTechnique
     *
     * @return string
     */
    public function getQualificationTechnique()
    {
        return $this->qualificationTechnique;
    }






    /**
     * Set modeAdjudication
     *
     * @param string $modeAdjudication
     * @return situationAppel
     */
    public function setModeAdjudication($modeAdjudication)
    {
        $this->modeAdjudication = $modeAdjudication;

        return $this;
    }

    /**
     * Get modeAdjudication
     *
     * @return string
     */
    public function getModeAdjudication()
    {
        return $this->modeAdjudication;
    }




    /**
     * Set soumission
     *
     * @param string $soumission
     * @return situationAppel
     */
    public function setSoumission($soumission)
    {
        $this->soumission = $soumission;

        return $this;
    }

    /**
     * Get soumission
     *
     * @return string
     */
    public function getSoumission()
    {
        return $this->soumission;
    }

    /**
     * Set motifs
     *
     * @param string $motifs
     * @return situationAppel
     */
    public function setMotifs($motifs)
    {
        $this->motifs = $motifs;

        return $this;
    }

    /**
     * Get motifs
     *
     * @return string
     */
    public function getMotifs()
    {
        return $this->motifs;
    }

    /**
     * Set suiviPlis
     *
     * @param \medaSys\AOBundle\Entity\suiviPlis $suiviPlis
     * @return situationAppel
     */
    public function setSuiviPlis(\medaSys\AOBundle\Entity\suiviPlis $suiviPlis = null)
    {
        $suiviPlis->setSituationAppel($this);
        $this->suiviPlis = $suiviPlis;

        return $this;
    }

    /**
     * Set dureeGarentie
     *
     * @param integer $dureeGarentie
     * @return situationAppel
     */
    public function setDureeGarentie($dureeGarentie)
    {
        $this->dureeGarentie = $dureeGarentie;

        return $this;
    }

    /**
     * Get dureeGarentie
     *
     * @return integer
     */
    public function getDureeGarentie()
    {
        return $this->dureeGarentie;
    }

    /**
     * Set delaiExection
     *
     * @param \DateTime $delaiExection
     * @return situationAppel
     */
    public function setDelaiExection($delaiExection)
    {
        $this->delaiExection = $delaiExection;

        return $this;
    }

    /**
     * Get delaiExection
     *
     * @return \DateTime
     */
    public function getDelaiExection()
    {
        return $this->delaiExection;
    }

    /**
     * Set penalites
     *
     * @param integer $penalites
     * @return situationAppel
     */
    public function setPenalites($penalites)
    {
        $this->penalites = $penalites;

        return $this;
    }

    /**
     * Get penalites
     *
     * @return integer
     */
    public function getPenalites()
    {
        return $this->penalites;
    }

    function __toString()
    {
        return "situationAppel";
    }

}
