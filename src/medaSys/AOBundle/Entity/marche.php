<?php

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="marche")
 */
class marche {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    public function __construct()
    {
        $this->datePassation=new \DateTime();

    }
    /**
     * @ORM\Column(type="string" ,length=100)
     */
    protected $objet;
    /**
     * @ORM\OneToOne(targetEntity="responsable")
     */
    protected $responsableProjet;//chrgé du projet
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $datePassation;
    /**
     * @ORM\ManyToOne(targetEntity="entreprise", inversedBy="marches")
     */
    protected $maitreOuvrage;
    /**
     * @ORM\OneToOne(targetEntity="situationMarche", mappedBy="marche")
     */
    protected $situationMarche;



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
     * @return marche
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
     * Set datePassation
     *
     * @param \datetime $datePassation
     * @return marche
     */
    public function setDatePassation(\datetime $datePassation)
    {
        $this->datePassation = $datePassation;

        return $this;
    }

    /**
     * Get datePassation
     *
     * @return \datetime
     */
    public function getDatePassation()
    {
        return $this->datePassation;
    }

    /**
     * Set responsableProjet
     *
     * @param \medaSys\AOBundle\Entity\responsableProjet $responsableProjet
     * @return marche
     */
    public function setResponsableProjet(\medaSys\AOBundle\Entity\responsableProjet $responsableProjet = null)
    {
        $this->responsableProjet = $responsableProjet;

        return $this;
    }

    /**
     * Get responsableProjet
     *
     * @return \medaSys\AOBundle\Entity\responsableProjet 
     */
    public function getresponsableProjet()
    {
        return $this->responsableProjet;
    }

    /**
     * Set maitreOuvrage
     *
     * @param \medaSys\AOBundle\Entity\entreprise $maitreOuvrage
     * @return marche
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
     * Set situationMarche
     *
     * @param \medaSys\AOBundle\Entity\situationMarche $situationMarche
     * @return marche
     */
    public function setSituationMarche(\medaSys\AOBundle\Entity\situationMarche $situationMarche = null)
    {
        $this->situationMarche = $situationMarche;

        return $this;
    }

    /**
     * Get situationMarche
     *
     * @return \medaSys\AOBundle\Entity\situationMarche 
     */
    public function getSituationMarche()
    {
        return $this->situationMarche;
    }




}
