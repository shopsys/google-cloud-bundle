<?php

namespace SS6\ShopBundle\Tests\Unit\Component\Cron;

use PHPUnit_Framework_TestCase;
use SS6\ShopBundle\Component\Cron\CronModuleExecutor;
use SS6\ShopBundle\Component\Cron\IteratedCronModuleInterface;

class CronModuleExecutorTest extends PHPUnit_Framework_TestCase {

	public function testRunModuleSuspendAfterTimeout() {
		$cronModuleServiceMock = $this->getMockForAbstractClass(IteratedCronModuleInterface::class);
		$cronModuleServiceMock->method('iterate')->willReturnCallback(function () {
			usleep(1000);
			return true;
		});

		$cronModuleExecutor = new CronModuleExecutor(1);
		$this->assertSame(CronModuleExecutor::RUN_STATUS_SUSPENDED, $cronModuleExecutor->runModule($cronModuleServiceMock));
	}

	public function testRunModuleAfterTimeout() {
		$cronModuleServiceMock = $this->getMockForAbstractClass(IteratedCronModuleInterface::class);
		$cronModuleServiceMock->expects($this->never())->method('iterate');

		$cronModuleExecutor = new CronModuleExecutor(1);
		sleep(1);
		$this->assertSame(CronModuleExecutor::RUN_STATUS_TIMEOUT, $cronModuleExecutor->runModule($cronModuleServiceMock));
	}

	public function testRunModule() {
		$cronModuleServiceMock = $this->getMockForAbstractClass(IteratedCronModuleInterface::class);
		$cronModuleServiceMock->expects($this->once())->method('iterate')->willReturn(false);

		$cronModuleExecutor = new CronModuleExecutor(1);
		$this->assertSame(CronModuleExecutor::RUN_STATUS_OK, $cronModuleExecutor->runModule($cronModuleServiceMock));
	}

}
