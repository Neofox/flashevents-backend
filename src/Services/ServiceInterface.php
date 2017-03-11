<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:10
 */

namespace FlashEvents\Services;

use FlashEvents\Entities\EntityInterface;

interface ServiceInterface
{

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function create(EntityInterface $entity) : EntityInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function update(EntityInterface $entity) : EntityInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return bool
     */
    public function delete(EntityInterface $entity) : bool;

    /**
     * @param array $params
     *
     * @return EntityInterface|array
     */
    public function find(array $params);

    /**
     * @return array
     */
    public function findAll() : array;
}