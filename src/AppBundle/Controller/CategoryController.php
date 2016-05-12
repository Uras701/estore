<?php namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends
    Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('AppBundle:Category:index.html.twig',
            [
                'categories' => $categories,
            ]);
    }

    /**
     * @param Category $category
     *
     * @ParamConverter("post", class="AppBundle:Category",)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Category $category)
    {
        return $this->render('AppBundle:Category:show.html.twig',
            [
                'category' => $category,
            ]);
    }

}
