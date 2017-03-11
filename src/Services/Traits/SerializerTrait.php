<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 18:34
 */

namespace FlashEvents\Services\Traits;

use FlashEvents\Services\Serializer;

trait SerializerTrait
{

    /** @var Serializer */
    protected $serializer;

    /**
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }

    /**
     * @param Serializer $serializer
     */
    public function setSerializer(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

}