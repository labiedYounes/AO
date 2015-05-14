<?php
/**
 * Created by PhpStorm.
 * User: jhonDoe
 * Date: 17/03/2015
 * Time: 16:09
 */

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="responsable")
 */
class responsable {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nom;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $responsabilite;

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
     * Set nom
     *
     * @param string $nom
     * @return responsable
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set responsabilite
     *
     * @param string $responsabilite
     * @return responsable
     */
    public function setResponsabilite($responsabilite)
    {
        $this->responsabilite = $responsabilite;

        return $this;
    }

    /**
     * Get responsabilite
     *
     * @return string 
     */
    public function getResponsabilite()
    {
        return $this->responsabilite;
    }
}
