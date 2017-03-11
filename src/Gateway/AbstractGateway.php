<?php

namespace FlashEvents\Gateway;

use Doctrine\ORM\EntityManager;

abstract class AbstractGateway
{

    /**
     * @var EntityManager
     */
    protected $em;


    /**
     * Gateway constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

    /**
     * @param EntityManager $em
     *
     * @return $this
     */
    public function setEm(EntityManager $em)
    {
        $this->em = $em;

        return $this;
    }
}