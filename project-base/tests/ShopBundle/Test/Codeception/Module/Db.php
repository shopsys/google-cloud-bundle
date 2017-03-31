<?php

namespace Tests\ShopBundle\Test\Codeception\Module;

use Codeception\Module\Db as BaseDb;
use Shopsys\ShopBundle\Component\Doctrine\DatabaseSchemaFacade;
use Tests\ShopBundle\Test\Codeception\Helper\SymfonyHelper;

class Db extends BaseDb
{
    // @codingStandardsIgnoreStart
    /**
     * Revert database to the original state
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    public function _afterSuite()
    {
        // @codingStandardsIgnoreEnd
        $this->cleanup();
        $this->loadDump();
    }

    public function cleanup()
    {
        $symfonyHelper = $this->getModule(SymfonyHelper::class);
        /* @var $symfonyHelper \Tests\ShopBundle\Test\Codeception\Helper\SymfonyHelper */
        $databaseSchemaFacade = $symfonyHelper->grabServiceFromContainer('shopsys.shop.component.doctrine.database_schema_facade');
        /* @var $databaseSchemaFacade \Shopsys\ShopBundle\Component\Doctrine\DatabaseSchemaFacade */
        $databaseSchemaFacade->dropSchemaIfExists('public');
        $databaseSchemaFacade->createSchema('public');
    }
}