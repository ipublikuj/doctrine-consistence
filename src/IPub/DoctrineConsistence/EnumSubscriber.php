<?php
/**
 * EnumSubscriber.php
 *
 * @copyright      More in license.md
 * @license        https://www.ipublikuj.eu
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Subscribers
 * @since          1.0.0
 *
 * @date           11.11.19
 */

declare(strict_types = 1);

namespace IPub\DoctrineConsistence;

use Consistence\Doctrine\Enum;

use Doctrine\Common;
use Doctrine\ORM;

use Nette;

/**
 * Enum types subscriber
 *
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Subscribers
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 *
 * @module         ipub/users-module
 */
final class EnumSubscriber extends Enum\EnumPostLoadEntityListener implements Common\EventSubscriber
{
	/**
	 * Implement nette smart magic
	 */
	use Nette\SmartObject;

	/**
	 * Register events
	 *
	 * @return string[]
	 */
	public function getSubscribedEvents() : array
	{
		return [
			ORM\Events::postLoad,
		];
	}

	public function __construct(
		Common\Annotations\Reader $annotationReader
	) {
		parent::__construct($annotationReader, NULL);
	}
}
