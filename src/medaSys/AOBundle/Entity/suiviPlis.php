<?php
/**
 * Created by PhpStorm.
 * User: jhonDoe
 * Date: 16/03/2015
 * Time: 19:44
 */

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="suiviPlis")
 */
class suiviPlis {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $dateOuverture;
    /**
     * @ORM\OneToOne(targetEntity="responsable")
     */
    protected $responsableCompte;
    /**
     * @ORM\OneToOne(targetEntity="responsable")
     */
    protected $chagerDepot;
    /**
     * @ORM\Column(type="string", length=100 ,nullable=true)
     */
    protected $seance;
    /**
     * @ORM\Column(type="string", length=100 ,nullable=true)
     */
    protected $lieuxOuverture;
    /**
     * @ORM\OneToOne(targetEntity="situationAppel",mappedBy="suiviPlis")
     */
    protected $situationAppel;
    /**
     * @ORM\OneToMany(targetEntity="lot", mappedBy="suiviPlis")
     */
    protected $lots;
    /**
     * @ORM\OneToMany(targetEntity="soumissionnairesPlis", mappedBy="suiviPlis",cascade={"remove","persist"})
     */
    protected $soumissionnaires;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateOuverture=new \DateTime();
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
     * Set dateOuverture
     *
     * @param \datetime $dateOuverture
     * @return suiviPlis
     */
    public function setDateOuverture(\datetime $dateOuverture=null)
{
    $this->dateOuverture = $dateOuverture;

    return $this;
}

    /**
     * Get dateOuverture
     *
     * @return \datetime
     */
    public function getDateOuverture()
    {
        return $this->dateOuverture;
    }
    public function setLieuxOuverture($lieuxOuverture)
    {
        $this->lieuxOuverture = $lieuxOuverture;

        return $this;
    }

    /**
     * Get dateOuverture
     *
     * @return \datetime
     */
    public function getLieuxOuverture()
    {
        return $this->lieuxOuverture;
    }

    /**
     * Set seance
     *
     * @param string $seance
     * @return suiviPlis
     */
    public function setSeance($seance)
    {
        $this->seance = $seance;

        return $this;
    }

    /**
     * Get seance
     *
     * @return string 
     */
    public function getSeance()
    {
        return $this->seance;
    }

    /**
     * Set responsableCompte
     *
     * @param \medaSys\AOBundle\Entity\responsable $responsableCompte
     * @return suiviPlis
     */
    public function setResponsableCompte(\medaSys\AOBundle\Entity\responsable $responsableCompte = null)
    {
        $this->responsableCompte = $responsableCompte;

        return $this;
    }

    /**
     * Get responsableCompte
     *
     * @return \medaSys\AOBundle\Entity\responsable 
     */
    public function getResponsableCompte()
    {
        return $this->responsableCompte;
    }

    /**
     * Set chagerDepot
     *
     * @param \medaSys\AOBundle\Entity\responsable $chagerDepot
     * @return suiviPlis
     */
    public function setChagerDepot(\medaSys\AOBundle\Entity\responsable $chagerDepot = null)
    {
        $this->chagerDepot = $chagerDepot;

        return $this;
    }

    /**
     * Get chagerDepot
     *
     * @return \medaSys\AOBundle\Entity\responsable 
     */
    public function getChagerDepot()
    {
        return $this->chagerDepot;
    }

    /**
     * Set situationAppel
     *
     * @param \medaSys\AOBundle\Entity\situationAppel $situationAppel
     * @return suiviPlis
     */
    public function setSituationAppel(\medaSys\AOBundle\Entity\situationAppel $situationAppel = null)
    {
        $this->situationAppel = $situationAppel;

        return $this;
    }

    /**
     * Get situationAppel
     *
     * @return \medaSys\AOBundle\Entity\situationAppel 
     */
    public function getSituationAppel()
    {
        return $this->situationAppel;
    }

    /**
     * Add lots
     *
     * @param \medaSys\AOBundle\Entity\lot $lots
     * @return suiviPlis
     */
    public function addLot(\medaSys\AOBundle\Entity\lot $lots)
    {
        $this->lots[] = $lots;

        return $this;
    }

    /**
     * Remove lots
     *
     * @param \medaSys\AOBundle\Entity\lot $lots
     */
    public function removeLot(\medaSys\AOBundle\Entity\lot $lots)
    {
        $this->lots->removeElement($lots);
    }

    /**
     * Get lots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLots()
    {
        return $this->lots;
    }

    /**
     * Add soumissionnaires
     *
     * @param \medaSys\AOBundle\Entity\soumissionnairesPlis $soumissionnaires
     * @return suiviPlis
     */
    public function addSoumissionnaire(\medaSys\AOBundle\Entity\soumissionnairesPlis $soumissionnaires)
    {
        $this->soumissionnaires[] = $soumissionnaires;

        return $this;
    }

    /**
     * Remove soumissionnaires
     *
     * @param \medaSys\AOBundle\Entity\soumissionnairesPlis $soumissionnaires
     */
    public function removeSoumissionnaire(\medaSys\AOBundle\Entity\soumissionnairesPlis $soumissionnaires)
    {
        $this->soumissionnaires->removeElement($soumissionnaires);
    }

    /**
     * Get soumissionnaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSoumissionnaires()
    {
        return $this->soumissionnaires;
    }
}
