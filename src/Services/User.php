<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:10
 */

namespace FlashEvents\Services;


use Doctrine\Common\Collections\ArrayCollection;
use FlashEvents\Entities\Address;
use FlashEvents\Entities\EntityInterface;
use FlashEvents\Entities\User as UserEntity;

class User extends AbstractService
{

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function create(EntityInterface $entity): EntityInterface
    {
        // TODO: Implement create() method.
    }

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function update(EntityInterface $entity): EntityInterface
    {
        // TODO: Implement update() method.
    }

    /**
     * @param EntityInterface $entity
     *
     * @return bool
     */
    public function delete(EntityInterface $entity): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param array $params
     *
     * @return EntityInterface|array
     */
    public function find(array $params)
    {
        return $this->getGateway()->fetch($params);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->getGateway()->fetchAll();
    }

    /**
     * @param int $userId
     *
     * @return ArrayCollection
     */
    public function findFriends(int $userId)
    {
        return $this->getGateway()->fetchAllFriends($userId);
    }

    /**
     * @param int $userId
     * @param int $friendId
     *
     * @return ArrayCollection|null
     */
    public function findFriend(int $userId, int $friendId)
    {
        /** @var ArrayCollection $friends */
        $friends = $this->getGateway()->fetchAllFriends($userId);

        return $friends->get($friendId);
    }

    public function addFriend(int $id, array $friendParams)
    {
        $friend = $this->hydrateUser($friendParams);
        /** @var \FlashEvents\Entities\User $user */
        $user = $this->find(['id' => $id]);

        $user->addFriend($friend);
        $this->getGateway()->persist($user);
    }

    public function deleteFriend(int $id, int $friendId)
    {
        /** @var \FlashEvents\Entities\User $user */
        $user = $this->find(['id' => $id]);

        /** @var \FlashEvents\Entities\User $friend */
        $friend = $this->find(['id' => $friendId]);

        $user->removeFriend($friend);
        $this->getGateway()->persist($user);
    }

    public function hydrateUser(array $params)
    {
        $user = new UserEntity();
        $user->setFisrtName($params['firstName']);
        $user->setLastName($params['lastName']);
        $user->setPassword($params['password']);
        $user->setEmail($params['email']);
        $user->setAddress($this->hydrateAddress($params['address']));
    }

    public function hydrateAddress(array $params)
    {
        $address = new Address();
        $address->setStreetName($params['streetName']);
        $address->setCity($params['city']);
        $address->setStreetNumber($params['streetNumber']);
        $address->setZipCode($params['zipCode']);
        $address->setLatitude($params['latitude']);
        $address->setLongitude($params['longitude']);

        return $address;
    }
}