<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 16:59
 */

namespace FlashEvents\Gateway;

use FlashEvents\Entities\EntityInterface;

class User extends AbstractGateway
{
    /**
     * @return array
     */
    public function fetchAll() : array {
        return $this->getRepository()->findAll();
    }

    /**
     * @param array $params
     *
     * @return array|EntityInterface
     */
    public function fetch(array $params)
    {
        return $this->getRepository()->findBy($params);
    }

    /**
     * @param int $userId
     *
     * @return \Traversable
     */
    public function fetchAllFriends(int $userId) : \Traversable
    {
        /** @var \FlashEvents\Entities\User $user */
        $user = $this->getRepository()->findOneBy(['id' => $userId]);

        return $user->getFriends();
    }

}