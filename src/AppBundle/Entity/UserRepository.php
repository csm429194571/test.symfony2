<?php
/**
 * Class UserRepository
 * 用户业务逻辑处理类
 * 时间：2016/05/06
 *author:chushangming
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username){
        return $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username',$username)
            ->setParameter('email',$username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}