<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 16:59
 */

namespace FlashEvents\Gateway;

class User extends AbstractGateway
{
    /**
     * @return array
     */
    public function fetchAll() {
        return $this->getRepository()->findAll();
    }

}