<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Class UserController
 * @package App\Controller
 *
 * @Route("/api/", name="api")
 */
class UserController extends AbstractController
{

    private $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("user", name="add_user", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'];
        $email = $data['email'];
        $nickname = $data['nickname'];
        $password = $data['password'];
        $birthdate = $data['birthdate'];

        if (empty($name) || empty($email) || empty($nickname) || empty($password) || empty($birthdate)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->userRepository->saveUser($name, $email, $nickname, $password, $birthdate);

        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("user/{uuid}", name="get_one_user", methods={"GET"})
     */
    public function get($uuid): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $uuid]);

        $data = [
            'uuid' => $user->getUuid(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'nickname' => $user->getNickname(),
            'birthdate' => $user->getBirthdate()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
