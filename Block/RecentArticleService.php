<?php
namespace Lpi\NewsBundle\Block;

use Lpi\NewsBundle\Repository\NewsRepository;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Templating\EngineInterface;

class RecentArticleService extends BaseBlockService
{
    protected $repo;

    /**
     * @param string $name
     * @param EngineInterface $templating
     * @param ManagerInterface $manager
     */
    public function __construct($name, EngineInterface $templating, NewsRepository $repo)
    {
        $this->repo = $repo;

        parent::__construct($name, $templating);
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'number' => 3,
            'template' => 'LpiNewsBundle:Block:recent_posts.html.twig',
        ));

        $resolver->setOptional(['articleIdContext']);
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        // merge settings
        $settings = $blockContext->getSettings();


        $queryBuilder = $this->repo->retrieveOrderedNewsByDate($settings);
        if(isset($settings['articleIdContext'])) {
            $queryBuilder->andWhere('e.id != :articleIdContext');
            $queryBuilder->setParameter('articleIdContext', $settings['articleIdContext']);
        }


        return $this->renderResponse($blockContext->getTemplate(), array(

            'block' => $blockContext->getBlock(),
            'settings' => $settings,
            'articles' => $queryBuilder->getQuery()->getResult()
        ), $response);
    }
}