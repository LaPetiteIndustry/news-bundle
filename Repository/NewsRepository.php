<?php
namespace Lpi\NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Ivory\CKEditorBundle\Exception\Exception;

class NewsRepository extends EntityRepository
{

    public function retrieveOrderedNewsByDate(array $settings = [])
    {
        $queryBuilder = $this->createQueryBuilder('e')->orderBy('e.date', 'DESC');
        $queryBuilder->setMaxResults($settings['number']);
        return $queryBuilder;
    }

    public function listArticleForSlider($sliderCode)
    {
        $queryBuilder = $this->createQueryBuilder('q');

        try {
            $queryBuilder1 = $queryBuilder->select('z')->from('ApplicationLpiKernelBundle:Zone','z')->where('z.slug = :code')->setParameter('code', $sliderCode);
        } catch (Exception $e) {
            return [];
        }
        $execute = $queryBuilder1->getQuery()->getOneOrNullResult();

        $data = [];

        if($execute === null) {
            return $data;
        }
        foreach($execute->getZoneHasNews() as $e) {
            $data[] = $e->getNews();
        }

        return $data;

    }
}