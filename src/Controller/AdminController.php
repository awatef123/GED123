<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use FOS\UserBundle\Model\UserManagerInterface;
/**
* @Route("/admin", name="admin")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route ("/utilisateurs",name="util")
     */
    public function usersList (UserManagerInterface $userManager){
        //$user = $userManager->findUserByUsername("admin");
        //var_dump(count($userManager->findUsers()));
        //$userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render("admin/users.html.twig",['users'=>$users]);
       
    }
    /**
     * @Route ("/util/modifier/{id}",name="modifier_user")
     */
    /*public function edituser  (users $user,Request $request){
        $form= $this->createForm(EditUserType::class,$user);
        $form->handleRequest($request);

        
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        return $this->redirectToRoute('admin');
    }
    
    return $this->render('admin/edituser.html.twig', [
        'userForm' => $form->createView(),
    ]);

    }*/

    
}
