<?php

namespace App\Controller;

use App\Entity\Bitcoin;
use App\Form\BitcoinType;
use App\Repository\BitcoinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/bitcoin')]
final class BitcoinController extends AbstractController
{
    
   #[Route('/comptes/{compte}',name: 'app_bitcoin_comptes', methods: ['GET'])]
    public function comptes(BitcoinRepository $bitcoinRepository, string $compte): Response
    {
       return $this->render('bitcoin/comptes.html.twig', [
      'compte'     => $compte,
      'bitcoins1'  => $bitcoinRepository->findBynull($compte),
      'bitcoins2'  => $bitcoinRepository->findBynotnull($compte),
      'bitcoins3'  => $bitcoinRepository->findBycomptes(),
      
        ]);
    }

    #[Route('/budgets/{year}/{budget}',name: 'app_bitcoin_index', methods: ['GET'])]
    public function index(BitcoinRepository $bitcoinRepository, string $year, string $budget): Response
    {
        return $this->render('bitcoin/budgets.html.twig', [
            'bitcoins' => $bitcoinRepository->findBybudget($budget),
            'mensuels' => $bitcoinRepository->findByyear($year),
            'annuels'  => $bitcoinRepository->findAllyear(2026),
            'year'     => $year,
            'budget'   => $budget
        ]); 
    }

    #[Route('/cheques',name: 'app_bitcoin_cheques', methods: ['GET'])]
    public function cheques(BitcoinRepository $bitcoinRepository): Response
    {
        return $this->render('bitcoin/cheques.html.twig', [
            'bitcoins' => $bitcoinRepository->findBycheques(),
        ]);
    }

    #[Route('/new', name: 'app_bitcoin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bitcoin = new Bitcoin();
        $form = $this->createForm(BitcoinType::class, $bitcoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bitcoin);
            $entityManager->flush();
            return $this->redirectToRoute('app_bitcoin_comptes', ['compte' => $bitcoin->getCompte()], Response::HTTP_SEE_OTHER);
           
        }

        return $this->render('bitcoin/new.html.twig', [
            'bitcoin' => $bitcoin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bitcoin_show', methods: ['GET'])]
    public function show(Bitcoin $bitcoin): Response
    {
        return $this->render('bitcoin/show.html.twig', [
            'bitcoin' => $bitcoin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bitcoin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bitcoin $bitcoin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BitcoinType::class, $bitcoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_bitcoin_comptes', ['compte' => $bitcoin->getCompte()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bitcoin/edit.html.twig', [
            'bitcoin' => $bitcoin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bitcoin_delete', methods: ['POST'])]
    public function delete(Request $request, Bitcoin $bitcoin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bitcoin->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bitcoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bitcoin_index', [], Response::HTTP_SEE_OTHER);
    }
}
