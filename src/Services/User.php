<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:10
 */

namespace FlashEvents\Services;


use FlashEvents\Entities\EntityInterface;

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

    public function findFriends(int $userId)
    {
        return $this->getGateway()->fetchAllFriends($userId);
    }
}