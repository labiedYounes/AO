<?php


namespace medaSys\AOBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;


class modelEtatsRepository extends EntityRepository{
    public function getDefaultAndAppel()
    {
       /* return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM medaSysAOBundle:modelEtats m
                 where m.isDefault==1 and m.type like "type" '
            )
            ->getResult();*/
        $rsm = new ResultSetMapping();
// build rsm here

        $query = $this->getEntityManager()->createNativeQuery('SELECT id FROM modelEtats WHERE isDefault = ? and type like ? ', $rsm);
        $query->setParameter(1, '1');
        $query->setParameter(2,'%appel%');

        $modelEtats = $query->getResult();
        return $modelEtats;
    }

} 