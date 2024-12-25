<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\DefaultType;
use App\Form\PatientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'Cabinet Dentaire Dr Carson',
        ]);
    }

    #[Route('/rendezvous', name: 'app_default_new', methods: ['GET', 'POST'])]
    public function newDefault(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();

        // Vérifie si la requête est AJAX
        if ($request->isXmlHttpRequest()) {
            // Retourne une réponse JSON pour le pop-up
            return new JsonResponse(['message' => 'Rendez-vous fixé avec succès !'], 200);
        }

        // Si ce n'est pas une requête AJAX, redirige (comportement classique)
        return $this->redirectToRoute('app_patient_index', [], Response::HTTP_SEE_OTHER);
    }

        return $this->render('default/booknow.html.twig', [
        'patient' => $patient,
        'form' => $form,
    ]);

    }

    #[Route('/popup', name: 'popup_page')]
    public function popup(): Response
    {
        return $this->render('patient/popup.html.twig');
    }
}
