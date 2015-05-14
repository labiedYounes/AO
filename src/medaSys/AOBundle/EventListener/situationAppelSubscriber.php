<?php


namespace medaSys\AOBundle\EventListener;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use medaSys\AOBundle\Entity\situationAppel;
use medaSys\AOBundle\Entity\Repository\modelEtatsRepository;
use medaSys\AOBundle\Entity\modelEats;
use medaSys\AOBundle\Entity\etat;


class situationAppelSubscriber implements  EventSubscriber  {
    public function getSubscribedEvents(){
        return array('postPersist');
    }
    public function postPersist(LifecycleEventArgs $args){
        $entity=$args->getEntity();
        if($entity instanceof situationAppel){
            $this->assignModel($args);
        }
    }
    public function assignModel(LifecycleEventArgs $args){
        $entity=  $args->getEntity();
        $em=$args->getEntityManager();
        if($entity->getModelEtats()==null){//if it has no modelEtats create a new one and add it to situationAppel
            $modelEtats= $em->getRepository('medaSysAOBundle:modelEtats')->getDefaultAndAppel();
            $entity->setModelEtats($modelEtats);
            $this->setEtats($entity,$em,$modelEtats);
            $em->persist($entity);
           // $em->flush();
        }
    }
    private function setEtats($entity,$em,$modelEtats){
         $etats=$modelEtats->getEtats();
        foreach($etats as   $etat){
            $this->setEtat($entity,$etat);

        }
    }
    private function setEtat($entity,\medaSys\AOBundle\Entity\etat  $etat){
        $clone=$etat->getClone();
        $clone->setSituationAppel($entity);
        $entity->addEtat($clone);
    }


} 