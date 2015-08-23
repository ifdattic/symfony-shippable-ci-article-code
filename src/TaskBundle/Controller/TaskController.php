<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Domain\Task\Entity\Task;
use Domain\Task\Value\TaskId;

class TaskController extends Controller
{
    public function listAction()
    {
        $serializer = $this->get('jms_serializer');
        $data = [
            'tasks' => [
                new Task(TaskId::generate()),
                new Task(TaskId::generate()),
                new Task(TaskId::generate()),
            ],
        ];

        return new Response($serializer->serialize($data, 'json'));
    }
}
