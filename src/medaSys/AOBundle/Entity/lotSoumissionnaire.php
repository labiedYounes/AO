<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="lotSoumissionnaire")
 */

class lotSoumissionnaire {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="lot", inversedBy="soumissionaire")
     */
    protected $lot;
    /**
     * @ORM\ManyToOne(targetEntity="entreprise", inversedBy="lots")
     */
    protected $soumissionnaire;


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
     * Set lot
     *
     * @param \medaSys\AOBundle\Entity\lot $lot
     * @return lotSoumissionnaire
     */
    public function setLot(\medaSys\AOBundle\Entity\lot $lot = null)
    {
        $this->lot = $lot;

        return $this;
    }

    /**
     * Get lot
     *
     * @return \medaSys\AOBundle\Entity\lot 
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * Set soumissionnaire
     *
     * @param \medaSys\AOBundle\Entity\entreprise $soumissionnaire
     * @return lotSoumissionnaire
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
}
