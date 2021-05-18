<?php declare(strict_types = 1);

namespace Tests\Cases;

use Consistence\Doctrine\Enum\Type;
use Doctrine\DBAL;
use IPub\DoctrineConsistence\Events;
use Tester\Assert;

require_once __DIR__ . '/../../../bootstrap.php';
require_once __DIR__ . '/../BaseTestCase.php';

/**
 * @testCase
 */
final class ExtensionTests extends BaseTestCase
{

	public function testFunctional(): void
	{
		$dic = $this->createContainer();

		Assert::true(DBAL\Types\Type::hasType(Type\BooleanEnumType::NAME));
		Assert::true(DBAL\Types\Type::hasType(Type\FloatEnumType::NAME));
		Assert::true(DBAL\Types\Type::hasType(Type\IntegerEnumType::NAME));
		Assert::true(DBAL\Types\Type::hasType(Type\StringEnumType::NAME));

		Assert::true($dic->getService('doctrineConsistence.subscriber') instanceof Events\EnumSubscriber);
	}

}

$test_case = new ExtensionTests();
$test_case->run();
