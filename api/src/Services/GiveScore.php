<?php

namespace App\Services;

use App\Entity\Agent;
use App\Entity\Project as Project;
use App\Entity\Score;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\User;

class GiveScore
{

    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function addScore(Agent $user)
    {
        $all = $this->em->getRepository(Agent::class)->findAll();
        var_dump($user);
        var_dump($all);


    }
}
