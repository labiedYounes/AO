<?php


namespace medaSys\AOBundle\Form;


class etatForm {
    private $em;
    public function __construct($form,$etats,$em){
        //$form->add('test','text',array('data'=>'test','mapped'=>false));

        /* foreach($etats as $etat){
             // $form->add('e'.$i++,,array('data'=>$etat->getValuesArray()['choices'],'mapped'=>false));
             switch($etat->getValuesArray()['type']){
                 case "choice":
                     $form->add('e'.$i++,$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'choices'=>$etat->getValuesArray()['options']['choices'],'multiple'=>true,'mapped'=>false));
                     break;
                 case "text":
                     $form->add('e'.$i++,$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'data'=>$etat->getValuesArray()['text'],'mapped'=>false));
                     break;
                 default:
                     break;
             }
         }*/
        $this->em=$em;
        foreach ($etats as $etat) {
            $func="get".$etat->getValuesArray()['type'];
            $this->$func($form,$etat);

        }


    }
    function getChoice($form,$etat){
        $form->add('e'.$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'choices'=>$etat->getValuesArray()['options']['choices'],'multiple'=>true,'mapped'=>false));
    }
    function getText($form,$etat){
        $form->add('e'.$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'data'=>$etat->getValuesArray()['text'],'mapped'=>false));
    }
    function getLink($form,$etat){
        $targets=$this->getTargets($etat);
        $form->add('e'.$etat->getOrderNum(),"choice",array('label'=>$etat->getValuesArray()["label"],'choices'=>$targets,'multiple'=>true,'mapped'=>false));
    }
    function getTargets($etat){
        return $this->em->getRepository($etat->getValuesArray()['targetEntity'])->findByIds($etat->getValuesArray()['targetsArray']);

    }

}