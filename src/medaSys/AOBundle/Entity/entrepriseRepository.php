<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\EntityRepository;

class entrepriseRepository  extends EntityRepository {
    public function findByIds($idArray){
        $entrepriseNoms=array();
        foreach($idArray as $id){
            $entrepriseNoms[]=$this->findOneById($id)->getNom();
        }
        return $entrepriseNoms;
    }
} 