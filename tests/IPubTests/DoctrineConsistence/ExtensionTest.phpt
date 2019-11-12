<?php
/**
 * Test: IPub\DoctrineConsistence\Extension
 * @testCase
 *
 * @copyright      More in license.md
 * @license        https://www.ipublikuj.eu
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Tests
 * @since          1.0.0
 *
 * @date           11.11.19
 */

declare(strict_types = 1);

namespace IPubTests\DoctrineConsistence;

use Doctrine;

use Nette;

use Consistence\Doctrine\Enum\Type;

use Tester;
use Tester\Assert;

use IPub\DoctrineConsistence;

require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php';

/**
 * Registering doctrine consistence extension tests
 *
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Tests
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 */
class ExtensionTest extends Tester\TestCase
{
	public function testFunctional() : void
	{
		$dic = $this->createContainer();

		Assert::true(Doctrine\DBAL\Types\Type::hasType(Type\FloatEnumType::NAME));
		Assert::true(Doctrine\DBAL\Types\Type::hasType(Type\IntegerEnumType::NAME));
		Assert::true(Doctrine\DBAL\Types\Type::hasType(Type\StringEnumType::NAME));

		Assert::true($dic->getService('doctrineConsistence.subscriber') instanceof DoctrineConsistence\EnumSubscriber);
	}

	/**
	 * @return Nette\DI\Container
	 */
	protected function createContainer() : Nette\DI\Container
	{
		$rootDir = __DIR__ . '/../../';

		$config = new Nette\Configurator();
		$config->setTempDirectory(TEMP_DIR);

		$config->addParameters(['container' => ['class' => 'SystemContainer_' . md5((string) time())]]);
		$config->addParameters(['appDir' => $rootDir, 'wwwDir' => $rootDir]);

		$config->addConfig(__DIR__ . DS . 'files' . DS . 'config.neon');

		DoctrineConsistence\DI\DoctrineConsistenceExtension::register($config);

		return $config->createContainer();
	}
}

\run(new ExtensionTest());
