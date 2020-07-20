<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function saveUser($name, $email, $nickname, $password, $birthdate){
        $newUser = new User();

        $newUser
            ->setUuid( Uuid::v4())
            ->setName($name)
            ->setEmail($email)
            ->setNickname($nickname)
            ->setPassword($password)
            ->setBirthdate(date_create($birthdate));

        $this->getEntityManager()->persist($newUser);
        $this->getEntityManager()->flush();

    }
}
