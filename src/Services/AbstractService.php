<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 17:47
 */

namespace FlashEvents\Services;


use FlashEvents\Entities\EntityInterface;
use FlashEvents\Gateway\GatewayInterface;

abstract class AbstractService implements ServiceInterface
{

    /** @var GatewayInterface */
    protected $gateway;

    /**
     * @return GatewayInterface
     */
    public function getGateway(): GatewayInterface
    {
        return $this->gateway;
    }

    /**
     * @param GatewayInterface $gateway
     *
     * @return $this
     */
    public function setGateway(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

}