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
 * @ORM\Table(name="enterprise")
 * @ORM\Entity(repositoryClass="medaSys\AOBundle\Entity\entrepriseRepository")
 */
class entreprise {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nomContact;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nomEntreprise;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $secteur;//secteur d'activité
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $forme;//forme juridique
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $adresse;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $telephone;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $fax;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $mail;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $site;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $type;//maitre ouvrage, modataire, soummisionnaire
    /**
     * @ORM\OneToMany(targetEntity="appel", mappedBy="maitreOuvrage",cascade={"remove"})
     * @ORM\JoinColumn(name="appel_id", referencedColumnName="id")
     */
    protected $appels;
    /**
     * @ORM\OneToMany(targetEntity="marche", mappedBy="maitreOuvrage")
     */
    protected $marches;
    /**
     * @ORM\OneToMany(targetEntity="lotSoumissionnaire", mappedBy="soumissionnaire")
     */
    protected $lots;// si type==soumissionnaire
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->marches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return entreprise
     */
    public function setNomContact($nom)
    {
        $this->nomContact = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNomcontact()
    {
        return $this->nomContact;
    }
    public function setNomEntreprise($nom)
    {
        $this->nomEntreprise = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }
    /**
     * Set sectereur
     *
     * @param string $sectereur
     * @return entreprise
     */
    public function setSectereur($sectereur)
    {
        $this->sectereur = $sectereur;

        return $this;
    }

    /**
     * Get sectereur
     *
     * @return string 
     */
    public function getSectereur()
    {
        return $this->sectereur;
    }

    /**
     * Set forme
     *
     * @param string $forme
     * @return entreprise
     */
    public function setForme($forme)
    {
        $this->forme = $forme;

        return $this;
    }

    /**
     * Get forme
     *
     * @return string 
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return entreprise
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return entreprise
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return entreprise
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return entreprise
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return entreprise
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
     * Add appels
     *
     * @param \medaSys\AOBundle\Entity\appel $appels
     * @return entreprise
     */
    public function addAppel(\medaSys\AOBundle\Entity\appel $appels)
    {
        $this->appels[] = $appels;

        return $this;
    }

    /**
     * Remove appels
     *
     * @param \medaSys\AOBundle\Entity\appel $appels
     */
    public function removeAppel(\medaSys\AOBundle\Entity\appel $appels)
    {
        $this->appels->removeElement($appels);
    }

    /**
     * Get appels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppels()
    {
        return $this->appels;
    }

    /**
     * Add marches
     *
     * @param \medaSys\AOBundle\Entity\marche $marches
     * @return entreprise
     */
    public function addMarch(\medaSys\AOBundle\Entity\marche $marches)
    {
        $this->marches[] = $marches;

        return $this;
    }

    /**
     * Remove marches
     *
     * @param \medaSys\AOBundle\Entity\marche $marches
     */
    public function removeMarch(\medaSys\AOBundle\Entity\marche $marches)
    {
        $this->marches->removeElement($marches);
    }

    /**
     * Get marches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMarches()
    {
        return $this->marches;
    }

    /**
     * Add lots
     *
     * @param \medaSys\AOBundle\Entity\lotSoumissionnaire $lots
     * @return entreprise
     */
    public function addLot(\medaSys\AOBundle\Entity\lotSoumissionnaire $lots)
    {
        $this->lots[] = $lots;

        return $this;
    }

    /**
     * Remove lots
     *
     * @param \medaSys\AOBundle\Entity\lotSoumissionnaire $lots
     */
    public function removeLot(\medaSys\AOBundle\Entity\lotSoumissionnaire $lots)
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
     * Get appel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppel()
    {
        return $this->appel;
    }
    public function __toString(){
        return $this->getNom();
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     * @return entreprise
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string 
     */
    public function getSecteur()
    {
        return $this->secteur;
    }
}
