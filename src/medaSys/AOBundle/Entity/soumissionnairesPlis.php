<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="soumissionnairesPlis")
 */
class soumissionnairesPlis {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="entreprise",cascade={"persist","remove"} )
     */
    protected $soumissionnaire;
    /**
     * @ORM\ManyToOne(targetEntity="suiviPlis", inversedBy="soumissionnaires",cascade={"persist"})
     */
    protected $suiviPlis;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank
     * @Assert\Regex("/\d+/") => options (pattern, match, message)
     */
    protected $montant;




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
     * Set montant
     *
     * @param string $montant
     * @return soumissionnairesPlis
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set soumissionnaire
     *
     * @param \medaSys\AOBundle\Entity\entreprise $soumissionnaire
     * @return soumissionnairesPlis
     */
    public function setSoumissionnaire(\medaSys\AOBundle\Entity\entreprise $soumissionnaire = null)
    {
        $this->soumissionnaire = $soumissionnaire;

        return $this;
    }

    /**
     * Get soumissionnaire
     *
     * @return \medaSys\AOBundle\Entity\entreprise 
     */
    public function getSoumissionnaire()
    {
        return $this->soumissionnaire;
    }

    /**
     * Set suiviPlis
     *
     * @param \medaSys\AOBundle\Entity\suiviPlis $suiviPlis
     * @return soumissionnairesPlis
     */
    public function setSuiviPlis(\medaSys\AOBundle\Entity\suiviPlis $suiviPlis = null)
    {
        $this->suiviPlis = $suiviPlis;
        $suiviPlis->addSoumissionnaire($this);

        return $this;
    }

    /**
     * Get suiviPlis
     *
     * @return \medaSys\AOBundle\Entity\suiviPlis 
     */
    public function getSuiviPlis()
    {
        return $this->suiviPlis;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return "plis";
    }

}
