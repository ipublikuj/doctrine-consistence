<?php declare(strict_types = 1);

/**
 * EnumSubscriber.php
 *
 * @copyright      More in LICENSE.md
 * @license        https://www.ipublikuj.eu
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Events
 * @since          0.1.0
 *
 * @date           11.11.19
 */

namespace IPub\DoctrineConsistence\Events;

use Consistence\Doctrine\Enum;
use Doctrine\Common;
use Doctrine\ORM;
use Nette;

/**
 * Enum types subscriber
 *
 * @package        iPublikuj:DoctrineConsistence!
 * @subpackage     Events
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 */
final class EnumSubscriber extends Enum\EnumPostLoadEntityListener implements Common\EventSubscriber
{

	use Nette\SmartObject;

	/**
	 * Register events
	 *
	 * @return string[]
	 */
	public function getSubscribedEvents(): array
	{
		return [
			ORM\Events::postLoad,
		];
	}

	public function __construct(
		Common\Annotations\Reader $annotationReader
	) {
		parent::__construct($annotationReader, null);
	}

}
