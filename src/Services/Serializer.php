<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 21:49
 */

namespace FlashEvents\Services;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\PersistentCollection;
use FlashEvents\Entities\EntityInterface;
use FlashEvents\Entities\User;

class Serializer
{

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Constructor
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    /**
     * @param EntityInterface[] $entities
     *
     * @return array
     */
    public function serializeEntities(array $entities)
    {
        $serializedEntities = [];

        foreach ($entities as $entity) {
            $serializedEntities[] = $this->serialize($entity);
        }

        return $serializedEntities;
    }

    /**
     * Serialize entity to array
     *
     * @param $entityObject
     *
     * @return array
     */
    public function serialize(EntityInterface $entityObject)
    {
        $data = [];

        $className = get_class($entityObject);
        $metaData = $this->em->getClassMetadata($className);

        foreach ($metaData->fieldMappings as $field => $mapping) {
            $method = "get" . ucfirst($field);
            $data[$field] = call_user_func([$entityObject, $method]);
        }

        foreach ($metaData->associationMappings as $field => $mapping) {
            // Sort of entity object
            $object = $metaData->reflFields[$field]->getValue($entityObject);

            if ($object instanceof PersistentCollection) {
                foreach ($object as $item) {
                    $data[$field] = $this->serialize($item);
                }
            } else {
                if (!empty($object)) {
                    $data[$field] = $this->serialize($object);
                }
            }
        }

        return $data;
    }
}