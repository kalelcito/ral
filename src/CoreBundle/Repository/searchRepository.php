<?php

namespace CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class searchRepository extends EntityRepository
{
     /**
     * Our new getAllPosts() method
     *
     * 1. Create & pass query to paginate method
     * 2. Paginate will return a `\Doctrine\ORM\Tools\Pagination\Paginator` object
     * 3. Return that object to the controller
     *
     * @param integer $currentPage The current page (passed from controller)
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function getAllSearch($currentPage = 1,$buscar,$t)
    {
        if($t==1){
            $query = $this->createQueryBuilder('a')
                ->where("a.activo = :activo ")
                ->andWhere("a.nombre LIKE :q")
                ->orWhere("a.contenido LIKE :q")
                ->orWhere("a.metakeys LIKE :q")
                ->orWhere("a.metadesc LIKE :q")
                ->setParameter('activo', 1)
                ->setParameter('q', "%".$buscar."%")
                ->orderBy('a.id','ASC')->getQuery();
        }elseif($t==2){
            $query = $this->createQueryBuilder('a')
                ->where("a.activo = :activo ")
                ->andWhere("a.nombre LIKE :q")
                ->orWhere("a.descripcion LIKE :q")
                ->orWhere("a.aplicacion LIKE :q")
                ->orWhere("a.beneficios LIKE :q")
                ->orWhere("a.especificaciones LIKE :q")
                ->orWhere("a.presentaciones LIKE :q")
                ->orWhere("a.caracteristicas LIKE :q")
                ->orWhere("a.metakeys LIKE :q")
                ->orWhere("a.metadesc LIKE :q")
                ->setParameter('activo', 1)
                ->setParameter('q', "%".$buscar."%")
                ->orderBy('a.id','ASC')->getQuery();
        }elseif($t==3){
            $query = $this->createQueryBuilder('a')
                ->where("a.activo = :activo ")
                ->andWhere("a.nombre LIKE :q")
                ->orWhere("a.descripcion LIKE :q")
                ->orWhere("a.metakeys LIKE :q")
                ->orWhere("a.metadesc LIKE :q")
                ->setParameter('activo', 1)
                ->setParameter('q', "%".$buscar."%")
                ->orderBy('a.id','ASC')->getQuery();
        }elseif($t==4){
            $query = $this->createQueryBuilder('a')
                ->where("a.activo = :activo ")
                ->andWhere("a.nombre LIKE :q")
                ->orWhere("a.zona LIKE :q")
                ->orWhere("a.metakeys LIKE :q")
                ->orWhere("a.metadesc LIKE :q")
                ->setParameter('activo', 1)
                ->setParameter('q', "%".$buscar."%")
                ->orderBy('a.id','ASC')->getQuery();
        }elseif($t==5){
            $query = $this->createQueryBuilder('a')
                ->where("a.activo = :activo ")
                ->andWhere("a.nombreDistribuidor LIKE :q")
                ->setParameter('activo', 1)
                ->setParameter('q', "%".$buscar."%")
                ->orderBy('a.id','ASC')->getQuery();
        }

        $paginator = $this->paginate($query, $currentPage);

        return $paginator;
    }

    /**
     * Paginator Helper
     *
     * Pass through a query object, current page & limit
     * the offset is calculated from the page and limit
     * returns an `Paginator` instance, which you can call the following on:
     *
     *     $paginator->getIterator()->count() # Total fetched (ie: `5` posts)
     *     $paginator->count() # Count of ALL posts (ie: `20` posts)
     *     $paginator->getIterator() # ArrayIterator
     *
     * @param Doctrine\ORM\Query $dql   DQL Query Object
     * @param integer            $page  Current page (defaults to 1)
     * @param integer            $limit The total number per page (defaults to 5)
     *
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function paginate($dql, $page = 1, $limit = 10)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1)) // Offset
            ->setMaxResults($limit); // Limit

        return $paginator;
    }
}