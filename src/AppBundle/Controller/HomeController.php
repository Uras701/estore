<?php namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HomeController
 *
 * @package AppBundle\Controller
 */
class HomeController extends
    Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:home:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutAction()
    {
        return $this->render('AppBundle:home:about.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactsAction()
    {
        return $this->render('AppBundle:home:contacts.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exampleAction()
    {
        return $this->render('AppBundle:home:example.html.twig');
    }
}
