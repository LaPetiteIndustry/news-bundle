<?php

namespace Lpi\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class NewsController extends Controller
{
    /**
     * @Template()
     */
    public function detailAction($id)
    {
        return ['news' => $this->get('lpi.news.repository.news')->find($id)];
    }

    /**
     * @Template()
     */
    public function archivesAction()
    {
        $articles = $this->get('lpi.news.repository.news')->findBy([],['date'=>'desc']);
        $data = [];
        foreach($articles as $article){
            $date = $article->getDate();
            $year = $date->format("Y");
            $month = $date->format("m");

            $data[$year][$month][] = $article;

        }
        return ['articles' => $data];
    }


}
