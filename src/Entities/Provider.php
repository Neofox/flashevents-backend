<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 15:03
 */

namespace FlashEvents\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="providers")
 */
class Provider implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="provider")
     * @var Provider
     */
    protected $events;

    /**
     * @ORM\ManyToOne(targetEntity="Provider",inversedBy="provider")
     * @var Token
     */
    protected $tokens;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Provider
     */
    public function setId(int $id): Provider
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Provider
     */
    public function setName(string $name): Provider
    {
        $this->name = $name;
        return $this;
    }
}