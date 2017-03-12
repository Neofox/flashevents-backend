<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 12/03/2017
 * Time: 00:54
 */

namespace FlashEvents\Services;


use FlashEvents\Entities\EntityInterface;

class Event extends AbstractService
{

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function create(EntityInterface $entity): EntityInterface
    {
        return $this->getGateway()->persist($entity);
    }

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function update(EntityInterface $entity): EntityInterface
    {
        return $this->getGateway()->persist($entity);
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
}