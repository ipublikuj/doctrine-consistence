<?php
/**
 * DoctrineConsistenceExtension.php
 *
 * @copyright      More in license.md
 * @license        https://www.ipublikuj.eu
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     DI
 * @since          1.0.0
 *
 * @date           11.11.19
 */

declare(strict_types = 1);

namespace IPub\DoctrineConsistence\DI;

use Nette;
use Nette\DI;
use Nette\Schema;

use Consistence\Doctrine\Enum\Type;

use IPub\DoctrineConsistence\Events;

/**
 * Doctrine consistence extension container
 *
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     DI
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 */
final class DoctrineConsistenceExtension extends DI\CompilerExtension
{
	/**
	 * {@inheritdoc}
	 */
	public function getConfigSchema() : Schema\Schema
	{
		return Schema\Expect::structure([
			'types'      => Schema\Expect::structure([
				'boolean' => Schema\Expect::bool(TRUE),
				'float'   => Schema\Expect::bool(TRUE),
				'integer' => Schema\Expect::bool(TRUE),
				'string'  => Schema\Expect::bool(TRUE),
			]),
		]);
	}

	/**
	 * @var array
	 */
	private $defaults = [
		'types'      => [
			'boolean' => TRUE,
			'float'   => TRUE,
			'integer' => TRUE,
			'string'  => TRUE,
		],
		'subscriber' => [
			'enabled' => TRUE,
			'tag'     => 'nettrine.subscriber',
		],
	];

	/**
	 * @return void
	 */
	public function loadConfiguration() : void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('subscriber'))
			->setType(Events\EnumSubscriber::class);
	}

	/**
	 * {@inheritdoc}
	 */
	public function afterCompile(Nette\PhpGenerator\ClassType $class) : void
	{
		parent::afterCompile($class);

		$configuration = $this->getConfig();

		/** @var Nette\PhpGenerator\Method $initialize */
		$initialize = $class->getMethods()['initialize'];

		if ($configuration->types->boolean) {
			$initialize->addBody(
				'if (!Doctrine\DBAL\Types\Type::hasType(?)) { Doctrine\DBAL\Types\Type::addType(?, ?); }',
				[
					Type\BooleanEnumType::NAME,
					Type\BooleanEnumType::NAME,
					Type\BooleanEnumType::class,
				]
			);
		}

		if ($configuration->types->float) {
			$initialize->addBody(
				'if (!Doctrine\DBAL\Types\Type::hasType(?)) { Doctrine\DBAL\Types\Type::addType(?, ?); }',
				[
					Type\FloatEnumType::NAME,
					Type\FloatEnumType::NAME,
					Type\FloatEnumType::class,
				]
			);
		}

		if ($configuration->types->integer) {
			$initialize->addBody(
				'if (!Doctrine\DBAL\Types\Type::hasType(?)) { Doctrine\DBAL\Types\Type::addType(?, ?); }',
				[
					Type\IntegerEnumType::NAME,
					Type\IntegerEnumType::NAME,
					Type\IntegerEnumType::class,
				]
			);
		}

		if ($configuration->types->string) {
			$initialize->addBody(
				'if (!Doctrine\DBAL\Types\Type::hasType(?)) { Doctrine\DBAL\Types\Type::addType(?, ?); }',
				[
					Type\StringEnumType::NAME,
					Type\StringEnumType::NAME,
					Type\StringEnumType::class,
				]
			);
		}
	}

	/**
	 * @param Nette\Configurator $config
	 * @param string $extensionName
	 *
	 * @return void
	 */
	public static function register(
		Nette\Configurator $config,
		string $extensionName = 'doctrineConsistence'
	) : void {
		$config->onCompile[] = function (Nette\Configurator $config, Nette\DI\Compiler $compiler) use ($extensionName) {
			$compiler->addExtension($extensionName, new DoctrineConsistenceExtension);
		};
	}
}
