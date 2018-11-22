<?php
    namespace App\Controller;

    use App\Entity\Person;

    use Symfony\Component\HttpFoundation\Response; 
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class PeopleController extends Controller{

        /**
         * @Route("/")
         * @Method({"GET"})
         */
        public function index() {
            $people= $this->getDoctrine()->getRepository(Person::class)->findBy(array(), array('lastContacted' =>'Asc'));
            return $this->render('people/index.html.twig', array('people' => $people));
        }

        /**
        * @Route("/people/{id}", name="person_show")
        */
        public function show($id) {
            $person = $this->getDoctrine()->getRepository(Person::class)->find($id);
            return $this->render('people/show.html.twig', array('person' => $person));
        }
        
        
        /**
         * @Route("/people/updateContacted/{id}")
         */
        public function updateContacted($id)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $person = $entityManager->getRepository(Person::class)->find($id);
        
            if (!$person) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }

            $person->updateLastContacted();
            $entityManager->flush();
            $people= $this->getDoctrine()->getRepository(Person::class)->findAll();
            return $this->render('people/index.html.twig', array('people' => $people));
        
    }
}