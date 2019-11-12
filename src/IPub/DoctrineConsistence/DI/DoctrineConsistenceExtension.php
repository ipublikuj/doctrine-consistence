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

use Consistence\Doctrine\Enum\Type;

use IPub\DoctrineConsistence;

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
	 * @var array
	 */
	private $defaults = [
		'tag' => 'nettrine.subscriber',
	];

	/**
	 * @return void
	 */
	public function loadConfiguration() : void
	{
		// Get container builder
		$builder = $this->getContainerBuilder();

		// Merge extension default config
		$this->setConfig(DI\Config\Helpers::merge($this->config, DI\Helpers::expand($this->defaults, $builder->parameters)));

		// Get extension configuration
		$configuration = $this->getConfig();

		$builder->addDefinition($this->prefix('subscriber'))
			->setType(DoctrineConsistence\EnumSubscriber::class)
			->addTag($configuration['tag']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function afterCompile(Nette\PhpGenerator\ClassType $class) : void
	{
		parent::afterCompile($class);

		/** @var Nette\PhpGenerator\Method $initialize */
		$initialize = $class->getMethods()['initialize'];

		$initialize->addBody('if (!Doctrine\DBAL\Types\Type::hasType(\'' . Type\FloatEnumType::NAME . '\')) { Doctrine\DBAL\Types\Type::addType(\'' . Type\FloatEnumType::NAME . '\', \'' . Type\FloatEnumType::class . '\'); }');
		$initialize->addBody('if (!Doctrine\DBAL\Types\Type::hasType(\'' . Type\IntegerEnumType::NAME . '\')) { Doctrine\DBAL\Types\Type::addType(\'' . Type\IntegerEnumType::NAME . '\', \'' . Type\IntegerEnumType::class . '\'); }');
		$initialize->addBody('if (!Doctrine\DBAL\Types\Type::hasType(\'' . Type\StringEnumType::NAME . '\')) { Doctrine\DBAL\Types\Type::addType(\'' . Type\StringEnumType::NAME . '\', \'' . Type\StringEnumType::class . '\'); }');
	}

	/**
	 * @param Nette\Configurator $config
	 * @param string $extensionName
	 *
	 * @return void
	 */
	public static function register(Nette\Configurator $config, string $extensionName = 'doctrineConsistence') : void
	{
		$config->onCompile[] = function (Nette\Configurator $config, Nette\DI\Compiler $compiler) use ($extensionName) {
			$compiler->addExtension($extensionName, new DoctrineConsistenceExtension);
		};
	}
}
