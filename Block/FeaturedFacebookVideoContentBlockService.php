<?php

namespace Lpi\NewsBundle\Block;

use Doctrine\ORM\EntityManager;
use Lpi\NewsBundle\Repository\FacebookVideoContentRepository;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

class FeaturedFacebookVideoContentBlockService extends BaseBlockService
{

    /**
     * @var FacebookVideoContentRepository
     */
    private $repository;

    public function __construct($name, EngineInterface $templating, FacebookVideoContentRepository $repository)
    {
        parent::__construct($name, $templating);
        $this->repository = $repository;
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        return new Response($this->getTemplating()->render('@LpiNews/Block/featured_facebook_video.html.twig',
            ['video' => $this->repository->findOneBy(['isEnabled' => true])]));
    }
}