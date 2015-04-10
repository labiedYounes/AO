<?php


namespace medaSys\AOBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;


class modelEtatsRepository extends EntityRepository{
    public function getDefaultAndAppel()
    {
       return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM medaSysAOBundle:modelEtats m
                 where m.isDefault=1 and m.type like \'%appel%\' '
            )
            ->getResult()[0];
    }

} 