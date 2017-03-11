<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 18:34
 */

namespace FlashEvents\Services\Traits;

use FlashEvents\Services\User;

trait UserManagerTrait
{

    /** @var User */
    protected $userManager;

    /**
     * @return User
     */
    public function getUserManager(): User
    {
        return $this->userManager;
    }

    /**
     * @param User $userManager
     *
     * @return $this
     */
    public function setUserManager(User $userManager)
    {
        $this->userManager = $userManager;

        return $this;
    }
}