<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 19:14
 */

namespace FlashEvents\Gateway;


use FlashEvents\Entities\EntityInterface;

class Event extends AbstractGateway
{

    /**
     * @return array
     */
    public function fetchAll(): array
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @param array $params
     *
     * @return EntityInterface|array
     */
    public function fetch(array $params)
    {
        return $this->getRepository()->findBy($params);
    }
}