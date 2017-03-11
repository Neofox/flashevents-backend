<?php

namespace FlashEvents\Gateway;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use FlashEvents\Entities\EntityInterface;

abstract class AbstractGateway implements GatewayInterface
{

    /** @var string */
    protected $entityClass;

    /**
     * @var EntityManager
     */
    protected $em;


    /**
     * @return EntityRepository
     */
    public function getRepository(): EntityRepository
    {
        return $this->getEm()->getRepository($this->entityClass);
    }

    /**
     * @param string $entity
     */
    public function setEntityClass(string $entity)
    {
        $this->entityClass = $entity;
    }


    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return $this->entityClass;
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


    public function persist(EntityInterface $entity) : EntityInterface
    {
        $this->getEm()->persist($entity);
        $this->getEm()->flush();

        return $entity;
    }
}