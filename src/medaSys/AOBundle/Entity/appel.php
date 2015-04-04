<?php


namespace medaSys\AOBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="appel")
 */
class appel{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $objet;
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type;//dev ...
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $passation;
    /**
     * @ORM\Column(type="integer")
     */
    protected $cp;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $ville;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $typeMarche;// privé|public
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateLimit;
    /**
     * @ORM\ManyToOne(targetEntity="entreprise", inversedBy="appel")
     */
    protected $entreprise;
    /**
     * @ORM\oneToOne(targetEntity="entreprise", mappedBy="appel")
     */
    protected $situationAppel;//oneToOne Bidirectionnal




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
     * Set objet
     *
     * @param string $objet
     * @return appel
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return appel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return appel
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set passation
     *
     * @param string $passation
     * @return appel
     */
    public function setPassation($passation)
    {
        $this->passation = $passation;

        return $this;
    }

    /**
     * Get passation
     *
     * @return string 
     */
    public function getPassation()
    {
        return $this->passation;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return appel
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return appel
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set typeMarche
     *
     * @param string $typeMarche
     * @return appel
     */
    public function setTypeMarche($typeMarche)
    {
        $this->typeMarche = $typeMarche;

        return $this;
    }

    /**
     * Get typeMarche
     *
     * @return string 
     */
    public function getTypeMarche()
    {
        return $this->typeMarche;
    }

    /**
     * Set dateLimit
     *
     * @param \datetime $dateLimit
     * @return appel
     */
    public function setDateLimit($dateLimit)
    {
        $this->dateLimit = $dateLimit;

        return $this;
    }

    /**
     * Get dateLimit
     *
     * @return \datetime
     */
    public function getDateLimit()
    {
        return $this->dateLimit;
    }

    /**
     * Set maitreOuvrage
     *
     * @param \medaSys\AOBundle\Entity\entreprise $maitreOuvrage
     * @return appel
     */
    public function setMaitreOuvrage(\medaSys\AOBundle\Entity\entreprise $maitreOuvrage = null)
    {
        $this->maitreOuvrage = $maitreOuvrage;

        return $this;
    }

    /**
     * Get maitreOuvrage
     *
     * @return \medaSys\AOBundle\Entity\entreprise 
     */
    public function getMaitreOuvrage()
    {
        return $this->maitreOuvrage;
    }

    /**
     * Set situationAppel
     *
     * @param \medaSys\AOBundle\Entity\entreprise $situationAppel
     * @return appel
     */
    public function setSituationAppel(\medaSys\AOBundle\Entity\entreprise $situationAppel = null)
    {
        $this->situationAppel = $situationAppel;

        return $this;
    }

    /**
     * Get situationAppel
     *
     * @return \medaSys\AOBundle\Entity\entreprise 
     */
    public function getSituationAppel()
    {
        return $this->situationAppel;
    }

    /**
     * Set entreprise
     *
     * @param \medaSys\AOBundle\Entity\entreprise $entreprise
     * @return appel
     */
    public function setEntreprise(\medaSys\AOBundle\Entity\entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \medaSys\AOBundle\Entity\entreprise 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
}
