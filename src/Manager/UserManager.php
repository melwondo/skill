<?php


namespace App\Manager;


use App\Contract\UserManagerInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager implements UserManagerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function createOrUpdate(User $user, bool $flush = true):void
    {
        /** @var int|null $id */
        $id = $user->getId();
        if (is_null($id)) {
            $this->em->persist($user);
        }
        if ($flush === true) {
            $this->em->flush();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function remove(User $user): void
    {
        $this->em->remove($user);
        $this->em->flush();
    }
}