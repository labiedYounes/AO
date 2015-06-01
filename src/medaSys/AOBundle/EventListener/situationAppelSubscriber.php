<?php


namespace medaSys\AOBundle\EventListener;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use medaSys\AOBundle\Entity\appel;
use medaSys\AOBundle\Entity\modelEats;


//class not used anymore
class situationAppelSubscriber implements  EventSubscriber  {
    private $em;


    public function getSubscribedEvents(){
        //return array('postPersist');

        return array();
    }
    public function postPersist(LifecycleEventArgs $args){
        $entity=$args->getEntity();
        $this->em=$args->getEntityManager();
        if($entity instanceof appel){
            ////$this->debugFun("postPersist");
            $this->assignModel($args);
        }
    }
    private function debugFun($msg){
        $appel=$this->em->getRepository('medaSysAOBundle:appel')->findOneById(3);
        $appel->setAppelDebug($msg);
        $this->em->persist($appel);
        $this->em->flush();
    }
    public function assignModel(LifecycleEventArgs $args){
     //  $this->debugFun("assignModel");
        $situationAppel=  $args->getEntity()->getSituationAppel();
        $this->em->flush();
        //$this->debugFun("assignModel".$situationAppel->getResultas());
        if($situationAppel->getModelEtats()==null){//if it has no modelEtats create a new one and add it to situationAppel
            $modelEtats= $this->em->getRepository('medaSysAOBundle:modelEtats')->getDefaultAndAppel();
         //  $this->debugFun($modelEtats->getType());
            $situationAppel->setModelEtats($modelEtats);
           // $this->debugFun($situationAppel->getModelEtats()->getType()." t");
            $this->setEtats($situationAppel,$modelEtats);
            $this->em->persist($situationAppel);
           $this->em->flush();

        }
    }
    private function setEtats($situationAppel,$modelEtats){
        $etats=$modelEtats->getEtats();
        $i=0;
        //$this->debugFun(sizeof($etats));
        foreach($etats as   $etat){
            $this->setEtat($situationAppel,$etat);
            $i++;
        }
        //$this->debugFun($i);
        //$situationAppel->setResultas($i);
    }
    private function setEtat($situationAppel,\medaSys\AOBundle\Entity\etat  $etat){
        $clone=$etat->getClone();
        $clone->setSituationAppel($situationAppel);
        $situationAppel->addEtat($clone);
       $this->em->persist($situationAppel->getAppel());

    }


} 