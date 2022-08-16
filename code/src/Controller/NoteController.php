<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\NoteLimitationType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Note;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Form\NoteType;

class NoteController extends AbstractController
{
    # Abdullah: Here is to handle with getting of notes' page
    #[Route('/notes', name: 'Note')]
    public function index(): Response
    {
        $notes = $this->getDoctrine()->getRepository(Note::class)->findAll();

        $q = $this->getDoctrine()->getManager()->getRepository(Note::class)->createQueryBuilder('a');
        $newQ =  $q->addOrderBy('a.time_created', 'DESC')
                    ->getQuery()
                    ->execute();

        $form = $this->createForm(NoteLimitationType::class);

        return $this->renderForm('note/index.html.twig', [
            'form' => $form,
            'newNotes' => $newQ,
        ]);
    }

    # Abdullah: Here is to handle with getting of notes' page with limitation and sorting
    #[Route('/notes', name: 'NotePost')]
    public function NotePost(Request $request): Response
    {
        $data = $request->get('note_limitation');
        $where = "";
        $parameters = "";

        if($data['SortingBy'] == 1){
            $sortBy = 'a.id';
        }elseif($data['SortingBy'] == 2){
            $sortBy = 'a.title';
        }elseif($data['SortingBy'] == 3){
            $sortBy = 'a.text';
        }elseif($data['SortingBy'] == 4){
            $sortBy = 'a.time_created';
        }else{
            $sortBy = 'a.time_created';
        }

        if($data['SortingDirection'] == 1){
            $sortDirection = 'ASC';
        }elseif($data['SortingDirection'] == 2){
            $sortDirection = 'DESC';
        }else{
            $sortDirection = 'DESC';
        }

        $notes = $this->getDoctrine()->getRepository(Note::class)->findAll();

        if($data['text'] != ""){
        $q = $this->getDoctrine()->getManager()->getRepository(Note::class)->createQueryBuilder('a');
        $newQ =  $q->addOrderBy($sortBy, $sortDirection)
                    ->setParameter('text', '%'.$data['text'].'%')
                    ->where("a.text like :text")
                    ->getQuery()
                    ->execute();
        }else{
            $q = $this->getDoctrine()->getManager()->getRepository(Note::class)->createQueryBuilder('a');
            $newQ =  $q->addOrderBy($sortBy, $sortDirection)
                        ->getQuery()
                        ->execute();            
        }
        $form = $this->createForm(NoteLimitationType::class);

        return $this->renderForm('note/index.html.twig', [
            'form' => $form,
            'newNotes' => $newQ,
        ]);
    }

    # Abdullah: Here is to handle with getting information of a specific note
    #[Route('/notes/show/{id}', name: 'noteShow')]
    public function noteShow(int $id): Response
    {
        $note = $this->getDoctrine()->getRepository(Note::class)->find($id);

        return $this->render('note/showNote.html.twig', [
            "id"            =>  $note->getId(),
            "title"         =>  $note->getTitle(),
            "text"          =>  $note->getText(),
            "timeCreated"   =>  $note->getTimeCreated(),
        ]);
    }

    # Abdullah: Here is to handle with getting of page of a note's creation
    #[Route('/notes/create', name: 'NoteCreate')]
    public function getCreate(): Response
    {
        $note = new Note;

        $form = $this->createForm(NoteType::class, $note);

        return $this->renderForm('create_note/index.html.twig', [
            'form' => $form,
        ]);
    }

    # Abdullah: Here is to handle with posting the creation of a note information
    #[Route('/notes/create/post', name: 'NoteCreatePost')]
    public function postCreate(Request $request): RedirectResponse
    {
       $request = $request->get('note');
        $note = new Note;
        $id = $this->getDoctrine()->getRepository(Note::class)->getMaxNoteId();
        $title = $request["title"];
        $text = $request["text"];
        $timeCreated = new \DateTimeImmutable();

        $note->setId($id);
        $note->setTitle($title);
        $note->setText($text);
        $note->setTimeCreated($timeCreated);

        $newNote = $this->getDoctrine()->getManager();
        $newNote->persist($note);
        $newNote->flush();

        return $this->redirectToRoute("Note");

    }

    # Abdullah: Here is to handle with getting of noteäs updating page
    #[Route('/notes/update/{id}', name: 'NoteUpdate')]
    public function getUpdate(int $id): Response
    {
        $note = new Note;
        $notes = $this->getDoctrine()->getRepository(Note::class)->find($id);

        $form = $this->createForm(NoteType::class, $note);

        return $this->renderForm('update_note/index.html.twig', [
            'form'  =>  $form,
            "id"    =>  $id,
            "title" =>  $notes->getTitle(),
            "text"  =>  $notes->getText(),
        ]);
    }

    # Abdullah: Here is to handle with posting of note's updating
    #[Route('/notes/update/{id}', name: 'NoteUpdatePost')]
    public function postUpdate(Request $request, int $id): RedirectResponse
    {

       $request = $request->get('note');

        $note = $this->getDoctrine()->getRepository(Note::class)->find($id);
        $title = $request["title"];
        $text = $request["text"];

        $note->setTitle($title);
        $note->setText($text);

        $newNote = $this->getDoctrine()->getManager();
        $newNote->persist($note);
        $newNote->flush();

        return $this->redirectToRoute("Note");

    }

    # Abdullah: Here is to handle with posting of note's deletion
    #[Route('/notes/delete/{id}', name: 'NoteUpdatePost')]
    public function DeletePost(Request $request, int $id): RedirectResponse
    {
       $request = $request->get('note');

        $note = $this->getDoctrine()->getRepository(Note::class)->find($id);

        $currentNote = $this->getDoctrine()->getManager();

        $currentNote->remove($note);
        $currentNote->flush();

        return $this->redirectToRoute("Note");

    }    
}
