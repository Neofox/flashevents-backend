<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 18:21
 */

namespace FlashEvents\Services;


use FlashEvents\Entities\EntityInterface;

class Provider extends AbstractService
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
        // TODO: Implement find() method.
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->getGateway()->fetchAll();
    }
}