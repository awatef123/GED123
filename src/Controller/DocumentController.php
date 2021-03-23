<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date ;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Document ;
use App\Form\DocumentType ;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class DocumentController extends AbstractController
{
     /**
      * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_AGENT')")
     * @Route("/ajouterdocument", name="ajouterdocument")
     */
    public function creationdocument(): Response
    {
      
        $entityManager = $this->getDoctrine()->getManager();

        $Document = new Document();
        $form= $this->createForm(DocumentType::class,$Document);
        $Document->setType('test');
        $Document->setSource('test');
        $Document->setObjet('test');
        $Document->setNumInterne('1111');
        $date = new \DateTime('2019-06-05  12:15:30');
        $Document->setDateDocumentation($date);

       
        $entityManager->persist($Document);  // notifier Doctrine qu'il ya un objet à enregister
        $entityManager->flush();
        return new Response('Document enregisté avec id   '.$Document->getId());
        return $this->render('Document/ajouter.html.twig',['form'=>$form->createView()]);
       
    }
     /**
      * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_AGENT')") 
     * @Route("/createdocument", name="createdocument")
     */

    public function ajouterdocument(Request $request):Response
    {
             $Document = new Document() ; 
             $form = $this->createForm(DocumentType::class, $Document);
             $form->handleRequest($request);
             if($form->isSubmitted()){
                 $entityManager=$this->getDoctrine()->getManager();
                 $entityManager->persist($Document);
                 $entityManager->flush($Document);
    
             return $this->redirectToRoute('afficherdocument'); }
        return $this->render('document/ajouter.html.twig',
        ['form'=> $form->createView() ]) ; }

  /**
    * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_AGENT')")
     * @Route("/afficherdocument", name="afficherdocument")
     */
    public function afficherdocument():Response 
    {


        $Document = $this->getDoctrine()->getRepository(Document::class)->findAll ();

        return $this->render('Document/index.html.twig', [
                  'Document' => $Document,]);
                  return $this->render('Document/show.html.twig',['Document' => $Document] );

    }
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("modifierdocument/{id}", name="modifierdocument")
     * Method({"GET", "POST"})
     */


    public function edit(Request $request, $id) {
        $Document = new Document();
        $Document = $this->getDoctrine()->getRepository(Document::class)->find($id);

        $form = $this->createForm(DocumentType::class,$Document);

        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('afficherdocument');
        }

        return $this->render('Document/index.html.twig', [
            'Document' => $Document,]);   }


      /**
       * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_AGENT')")
     * @Route("/document/{id}", name="document")
     */
    public function show($id) {
        $Document = $this->getDoctrine()->getRepository(Document::class)->find($id);
  
        return $this->render('Document/show.html.twig', [
            'Document' => $Document,]);
      }
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/deletedocument/{id}",name="delete_document")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $Document= $this->getDoctrine()->getRepository(Document::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($Document);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();

        return $this->redirectToRoute('afficherdocument');
    }
     /**
      * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_AGENT')")
     * @Route("/modifierdocument/{id}", name="modifierdocument")
     * Method({"GET", "POST"})
     */
    public function modifier(Request $request, $id) {
        $Document = new Document ();
        $Document = $this->getDoctrine()->getRepository(Document::class)->find($id);
  
        $form = $this->createFormBuilder($Document)
          ->add('Type', TextType::class)
          ->add('Source', TextType::class)
          ->add('Objet', TextType::class)
          ->add('NumInterne', TextType::class)

          ->add('save', SubmitType::class, array(
            'label' => 'Modifier'  ,
              ) )     
          
              ->add('saveAdd', SubmitType::class, array(
                'label' => 'Annuler'  ))
          
        ->getForm();
  
        $form->handleRequest($request);
        if($form->isSubmitted() ) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          return $this->redirectToRoute('afficherdocument');
        }
  
        return $this->render('document/edit.html.twig', ['form' => $form->createView()]);
      }
    
     
}
