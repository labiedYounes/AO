<?php
/**
 * Created by PhpStorm.
 * User: jhonDoe
 * Date: 16/03/2015
 * Time: 19:43
 */

namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="etat")
 */
class etat {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $ref;//nom
    /**
     * @ORM\Column(type="json_array")
     */
    protected $valuesArray;

    /**
     * @ORM\Column(type="integer")
     */
    protected $orderNum;
    /**
     * @ORM\ManyToOne(targetEntity="situationAppel", inversedBy="etats",cascade={"persist","remove"})
     */
    protected $situationAppel;
    /**
     * @ORM\ManyToOne(targetEntity="situationMarche", inversedBy="etats",cascade={"persist","remove"})
     */
    protected $situationMarche;
    /**
     * @ORM\ManyToOne(targetEntity="modelEtats", inversedBy="etats")
     */
    protected $modelEtats;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $displayedString;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
        return $this;
    }
    /**
     * Set ref
     *
     * @param string $ref
     * @return etat
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set hasDate
     *
     * @param string $hasDate
     * @return etat
     */
    public function setHasDate($hasDate)
    {
        $this->hasDate = $hasDate;

        return $this;
    }

    /**
     * Get hasDate
     *
     * @return string 
     */
    public function getHasDate()
    {
        return $this->hasDate;
    }

    /**
     * Set hasNum
     *
     * @param boolean $hasNum
     * @return etat
     */
    public function setHasNum($hasNum)
    {
        $this->hasNum = $hasNum;

        return $this;
    }

    /**
     * Get hasNum
     *
     * @return boolean 
     */
    public function getHasNum()
    {
        return $this->hasNum;
    }

    /**
     * Set hasChoices
     *
     * @param boolean $hasChoices
     * @return etat
     */
    public function setHasChoices($hasChoices)
    {
        $this->hasChoices = $hasChoices;

        return $this;
    }

    /**
     * Get hasChoices
     *
     * @return boolean 
     */
    public function getHasChoices()
    {
        return $this->hasChoices;
    }

    /**
     * Set isLinked
     *
     * @param boolean $isLinked
     * @return etat
     */
    public function setIsLinked($isLinked)
    {
        $this->isLinked = $isLinked;

        return $this;
    }

    /**
     * Get isLinked
     *
     * @return boolean 
     */
    public function getIsLinked()
    {
        return $this->isLinked;
    }

    /**
     * Set valuesArray
     *
     * @param array $valuesArray
     * @return etat
     */
    public function setValuesArray($valuesArray)
    {
        $this->valuesArray = $valuesArray;

        return $this;
    }

    /**
     * Get valuesArray
     *
     * @return array 
     */
    public function getValuesArray()
    {
        return $this->valuesArray;
    }

    /**
     * Set situationAppel
     *
     * @param \medaSys\AOBundle\Entity\situationAppel $situationAppel
     * @return etat
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
     * @return etat
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

    /**
     * Set displayedString
     *
     * @param string $displayedString
     * @return etat
     */
    public function setDisplayedString($displayedString)
    {
        $this->displayedString = $displayedString;

        return $this;
    }

    /**
     * Get displayedString
     *
     * @return string 
     */
    public function getDisplayedString()
    {
        return $this->displayedString;
    }

    /**
     * Set modelEtats
     *
     * @param \medaSys\AOBundle\Entity\modelEtats $modelEtats
     * @return etat
     */
    public function setModelEtats(\medaSys\AOBundle\Entity\modelEtats $modelEtats = null)
    {
        $this->modelEtats = $modelEtats;

        return $this;
    }

    /**
     * Get modelEtats
     *
     * @return \medaSys\AOBundle\Entity\modelEtats 
     */
    public function getModelEtats()
    {
        return $this->modelEtats;
    }

    /**
     * clones etat without copying id , modelEtats,situationAppel or situationMarch
     */
    public function getClone(){
        $clonedEtat=new etat();
        $clonedEtat->setDisplayedString($this->getDisplayedString());
        $clonedEtat->setValuesArray($this->getValuesArray());
        $clonedEtat->setRef($this->getRef());
        $clonedEtat->setOrderNum($this->getOrderNum());
        return $clonedEtat;
    }




    /**
     * Set orderNum
     *
     * @param integer $orderNum
     * @return etat
     */
    public function setOrderNum($orderNum)
    {
        $this->orderNum = $orderNum;

        return $this;
    }

    /**
     * Get orderNum
     *
     * @return integer 
     */
    public function getOrderNum()
    {
        return $this->orderNum;
    }
}
