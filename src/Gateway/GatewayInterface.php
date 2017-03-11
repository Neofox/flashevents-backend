<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:48
 */

namespace FlashEvents\Gateway;


use FlashEvents\Entities\EntityInterface;

interface GatewayInterface
{

    /**
     * @return array
     */
    public function fetchAll() : array ;

    /**
     * @param array $params
     *
     * @return EntityInterface|array
     */
    public function fetch(array $params);

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function persist(EntityInterface $entity) : EntityInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function create(EntityInterface $entity) : EntityInterface;
}