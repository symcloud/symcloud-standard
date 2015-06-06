<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractKernel.php');

/**
 * The admin kernel is for the backend
 */
class AdminKernel extends \AbstractKernel
{
    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);
        $this->setContext(self::CONTEXT_ADMIN);
    }

    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        $bundles[] = new Sulu\Bundle\AdminBundle\SuluAdminBundle();
        $bundles[] = new Symfony\Bundle\SecurityBundle\SecurityBundle();

        // symcloud
        $bundles[] = new FOS\OAuthServerBundle\FOSOAuthServerBundle();
        $bundles[] = new \Symcloud\Bundle\OAuth2Bundle\SymcloudOAuth2Bundle();
        $bundles[] = new \Symcloud\Bundle\StorageBundle\SymcloudStorageBundle();
        $bundles[] = new \Symcloud\Bundle\SuluBundle\SymcloudSuluBundle();

        return $bundles;
    }
}
