<?php


namespace medaSys\AOBundle\Form;


class etatForm {
    private $em;
    private $hiddenStr="";
    private $etats;
    private $form;
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
        $this->etats=$etats;
        $this->form=$form;

    }
    public function renderEtats(){
        foreach ($this->etats as $etat) {
            $func="get".$etat->getValuesArray()['type'];
            $this->$func($this->form,$etat);

        }

        $this->form->add("hiddenStr",'hidden',array('data'=>$this->hiddenStr,'mapped'=>false));


    }
    public function processEtats(){
        $etatsToPersist=$this->getAllETatsIds();
        $this->saveEtats($etatsToPersist);


    }

    private function getAllEtatsIds(){
        $etatsToPersist=array();
        foreach ($this->etats as $etat) {
            if($this->form->get($etat->getValuesArray()['displayArea'].$etat->getOrderNum())){
                $etatsToPersist[]=$etat;
            }

        }
        return $etatsToPersist;

    }
    private function saveEtats($etatsToPersist){
        foreach($etatsToPersist as $etat){
            $func="set".$etat->getValuesArray()['type'];
            $this->$func($this->form,$etat);
        }
        $this->em->flush();
    }
    function setChoice($form,$etat){
        $etat->getValuesArray()['options']['checked']=$form->get($etat->getValuesArray()['displayArea'].$etat->getOrderNum());
        $this->em->persist($etat);

    }
    function setText($form,$etat){
        $etat->getValuesArray()['text']=$form->get($etat->getValuesArray()['displayArea'].$etat->getOrderNum());
        $this->em->persist($etat);

    }


    function getChoice($form,$etat){
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'choices'=>$etat->getValuesArray()['options']['choices'],'data'=>$etat->getValuesArray()['options']['checked'],'multiple'=>false,'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
    }
    function getText($form,$etat){
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'data'=>$etat->getValuesArray()['text'],'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
    }
    function getLink($form,$etat){
        $targets=$this->getTargets($etat);
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),"choice",array('label'=>$etat->getValuesArray()["label"],'choices'=>$targets,'multiple'=>true,'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
    }
    function getTargets($etat){
        return $this->em->getRepository($etat->getValuesArray()['targetEntity'])->findByIds($etat->getValuesArray()['targetsArray']);

    }

}