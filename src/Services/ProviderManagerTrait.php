<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/03/2017
 * Time: 18:34
 */

namespace FlashEvents\Services;


trait ProviderManagerTrait
{

    /** @var Provider */
    protected $providerManager;

    /**
     * @return Provider
     */
    public function getProviderManager(): Provider
    {
        return $this->providerManager;
    }

    /**
     * @param Provider $providerManager
     *
     * @return $this
     */
    public function setProviderManager(Provider $providerManager)
    {
        $this->providerManager = $providerManager;

        return $this;
    }
}