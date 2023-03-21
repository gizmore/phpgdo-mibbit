<?php
namespace GDO\Mibbit\Method;

use GDO\Core\GDT_Checkbox;
use GDO\Mibbit\Module_Mibbit;
use GDO\UI\MethodPage;

/**
 * Render Chat page.
 *
 * @version 7.0.1
 * @since 3.0.0
 * @author gizmore
 */
final class Chat extends MethodPage
{

	public function isTrivial(): bool
	{
		return false;
	}

	public function gdoParameters(): array
	{
		return [
			GDT_Checkbox::make('fullscreen')->initial(Module_Mibbit::instance()->getConfigVar('mibbit_fullscreen')),
		];
	}

	public function getMethodTitle(): string
	{
		return t('btn_mibbit');
	}

}
