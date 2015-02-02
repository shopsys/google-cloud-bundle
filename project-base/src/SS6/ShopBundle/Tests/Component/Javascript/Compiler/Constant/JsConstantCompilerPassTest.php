<?php

namespace SS6\ShopBundle\Tests\Javascript\Compiler\Constant;

use SS6\ShopBundle\Component\Javascript\Compiler\JsCompiler;
use SS6\ShopBundle\Component\Test\FunctionalTestCase;

class JsConstantCompilerPassTest extends FunctionalTestCase {

	public function testProcess() {
		$jsConstantCompilerPass = $this->getContainer()
			->get('ss6.shop.component.javascript.compiler.constant.js_constant_compiler_pass');

		$jsCompiler = new JsCompiler([
			$jsConstantCompilerPass,
		]);

		$content = file_get_contents(__DIR__ . '/testFoo.js');
		$result = $jsCompiler->compile($content);

		$expectedResult = <<<EOD
var x = SS6.constant ( "bar" );
var y = SS6.constant ( "bar2" );
EOD
			;

		$this->assertEquals($expectedResult, $result);
	}

	public function testProcessConstantNotFoundException() {
		$this->setExpectedException(\SS6\ShopBundle\Component\Javascript\Compiler\Constant\Exception\ConstantNotFoundException::class);

		$jsConstantCompilerPass = $this->getContainer()
			->get('ss6.shop.component.javascript.compiler.constant.js_constant_compiler_pass');

		$jsCompiler = new JsCompiler([
			$jsConstantCompilerPass,
		]);

		$content = file_get_contents(__DIR__ . '/testBar.js');
		$jsCompiler->compile($content);
	}

}
