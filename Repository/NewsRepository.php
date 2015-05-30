<?php
namespace Lpi\NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class NewsRepository extends EntityRepository
{

    public function retrieveOrderedNewsByDate(array $settings = [])
    {


        $queryBuilder = $this->createQueryBuilder('e')->orderBy('e.date', 'DESC');
        $queryBuilder->setMaxResults($settings['number']);
        return $queryBuilder;
    }
}