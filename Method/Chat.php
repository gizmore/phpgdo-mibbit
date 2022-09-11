<?php
namespace GDO\Mibbit\Method;

use GDO\UI\MethodPage;
use GDO\Core\GDT_Checkbox;
use GDO\Mibbit\Module_Mibbit;

/**
 * Render Chat page.
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 3.0.0
 */
final class Chat extends MethodPage
{
	public function gdoParameters() : array
	{
		return [
			GDT_Checkbox::make('fullscreen')->initial(Module_Mibbit::instance()->getConfigVar('mibbit_fullscreen')),
		];
	}
	
	public function getMethodTitle() : string
	{
	    return t('btn_mibbit');
	}
	
}
