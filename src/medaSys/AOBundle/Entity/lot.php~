<?php
/**
 * Created by PhpStorm.
 * User: jhonDoe
 * Date: 16/03/2015
 * Time: 19:44
 */

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="lot")
 */
class lot {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $numero;
    /**
     * @ORM\OneToMany(targetEntity="lotSoumissionnaire", mappedBy="lot")
     */
    protected $soumissionnaires;//manyToMany
    /**
     * @ORM\ManyToOne(targetEntity="suiviPlis", inversedBy="lots")
     */
    protected $suiviPlis;//manyToOne


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->soumissionnaires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero
     *
     * @param integer $numero
     * @return lot
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Add soumissionnaires
     *
     * @param \medaSys\AOBundle\Entity\lotSoumissionnaire $soumissionnaires
     * @return lot
     */
    public function addSoumissionnaire(\medaSys\AOBundle\Entity\lotSoumissionnaire $soumissionnaires)
    {
        $this->soumissionnaires[] = $soumissionnaires;

        return $this;
    }

    /**
     * Remove soumissionnaires
     *
     * @param \medaSys\AOBundle\Entity\lotSoumissionnaire $soumissionnaires
     */
    public function removeSoumissionnaire(\medaSys\AOBundle\Entity\lotSoumissionnaire $soumissionnaires)
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

    /**
     * Set suiviPlis
     *
     * @param \medaSys\AOBundle\Entity\suiviPlis $suiviPlis
     * @return lot
     */
    public function setSuiviPlis(\medaSys\AOBundle\Entity\suiviPlis $suiviPlis = null)
    {
        $this->suiviPlis = $suiviPlis;

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
}
