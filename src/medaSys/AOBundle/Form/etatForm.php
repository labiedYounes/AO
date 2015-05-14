<?php


namespace medaSys\AOBundle\Form;


class etatForm {
    private $em;
    private $hiddenStr="";
    private $etats;
    private $form;
    private $request;
    public function __construct($form,$etats,$em,$request=null){

        $this->em=$em;
        $this->etats=$etats;
        $this->form=$form;
        $this->request=$request;

    }

    public function renderEtats(){
        foreach ($this->etats as $etat) {
            $func="get".$etat->getValuesArray()['type'];
            $this->$func($this->form,$etat);

        }

        $this->form->add("hiddenStr",'hidden',array('data'=>$this->hiddenStr,'mapped'=>false));


    }
    public function processEtats(){
        ////$this->deugFun("process");
        $etatsToPersist=$this->getAllETatsIds();


        $this->saveEtats($etatsToPersist);


    }


    private function getAllEtatsIds(){
        $etatsToPersist=array();
        foreach ($this->etats as $etat) {


              if($this->etatExistInRequest($etat->getValuesArray()['displayArea'].$etat->getOrderNum())){
                  $etatsToPersist[]=$etat;
              }

          }
          ////$this->debugFun("getAllEtatsIds done size ".sizeof($etatsToPersist));
          return $etatsToPersist;

    }
    private function etatExistInRequest($key){
        return array_key_exists($key,$this->request->request->get("medasys_aobundle_appel"))? true : false ;
    }
    private function saveEtats($etatsToPersist){
        foreach($etatsToPersist as $etat){
            $func="set".$etat->getValuesArray()['type'];
            $this->$func($this->form,$etat);
            ////$this->deugFun($etat->getValuesArray()['label']);
        }
        // $this->em->flush();
    }
    private function debugFun($msg){
        $appel=$this->em->getRepository('medaSysAOBundle:appel')->findOneById(1);
        $appel->setAppelDebug($msg);
        $this->em->persist($appel);
        $this->em->flush();



    }
    function setChoice($form,$etat){
        $phpArray=$etat->getValuesArray();
        $phpArray['options']['checked']=$this->request->request->get("medasys_aobundle_appel")[$etat->getValuesArray()['displayArea'].$etat->getOrderNum()];
        $etat->setValuesArray($phpArray);
        $this->em->persist($etat);
        $this->em->flush();
        ////$this->debugFun(json_encode($phpArray));


    }
    function setText($form,$etat){
        $phpArray=$etat->getValuesArray();
        $phpArray['text']=$this->request->request->get("medasys_aobundle_appel")[$etat->getValuesArray()['displayArea'].$etat->getOrderNum()];
        $etat->setValuesArray($phpArray);
        $this->em->persist($etat);
        $this->em->flush();
        ////$this->debugFun(json_encode($phpArray));
      //  ////$this->debugFun($etat->getValuesArray()['displayArea'].$etat->getOrderNum());



    }


    function getChoice($form,$etat){
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'choices'=>$etat->getValuesArray()['options']['choices'],'data'=>$etat->getValuesArray()['options']['checked'],'multiple'=>false,'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
        ////$this->deugFun($etat->getValuesArray()['label']);
    }
    function getText($form,$etat){
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),$etat->getValuesArray()['type'],array('label'=>$etat->getValuesArray()["label"],'data'=>$etat->getValuesArray()['text'],'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
        ////$this->deugFun($etat->getValuesArray()['label']);
    }
    function getLink($form,$etat){
        $targets=$this->getTargets($etat);
        $form->add($etat->getValuesArray()['displayArea'].$etat->getOrderNum(),"choice",array('label'=>$etat->getValuesArray()["label"],'choices'=>$targets,'multiple'=>true,'mapped'=>false));
        $this->hiddenStr.=$etat->getValuesArray()['displayArea'].$etat->getOrderNum().",";
        ////$this->deugFun($etat->getValuesArray()['label']);
    }
    function getTargets($etat){
        return $this->em->getRepository($etat->getValuesArray()['targetEntity'])->findByIds($etat->getValuesArray()['targetsArray']);

    }

}