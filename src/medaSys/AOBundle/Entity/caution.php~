<?php



namespace medaSys\AOBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="caution")
 */
class caution {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    public function __construct()
    {
        $this->dateRetour=new \DateTime();
        $this->dateDemande=new \DateTime();

    }
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type="def";
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $dateDemande;
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\GreaterThan("+1 days")
     */
    protected $dateRetour;
    /**
     * @ORM\ManyToOne(targetEntity="situationAppel", inversedBy="cautions")
     */
    protected $situationAppel;//manyToOne bidirectionnal
    /**
     * @ORM\ManyToOne(targetEntity="situationMarche", inversedBy="cautions")
     */
    protected $situationMarche;//manyToOne Bidirectionnal


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
     * Set type
     *
     * @param string $type
     * @return caution
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
     * Set dateDemande
     *
     * @param \datetime $dateDemande
     * @return caution
     */
    public function setDateDemande(\datetime $dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \datetime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateRetour
     *
     * @param \datetime $dateRetour
     * @return caution
     */
    public function setDateRetour(\datetime $dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \datetime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set situationAppel
     *
     * @param \medaSys\AOBundle\Entity\situationAppel $situationAppel
     * @return caution
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
     * Set situationMarche
     *
     * @param \medaSys\AOBundle\Entity\situationMarche $situationMarche
     * @return caution
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
