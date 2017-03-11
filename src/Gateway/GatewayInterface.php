<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:48
 */

namespace FlashEvents\Gateway;


interface GatewayInterface
{

    /**
     * @return array
     */
    public function fetchAll() : array ;
}