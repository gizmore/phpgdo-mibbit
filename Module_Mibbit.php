<?php
namespace GDO\Mibbit;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_String;
use GDO\Net\GDT_Hostname;
use GDO\Net\GDT_Port;
use GDO\Core\GDT_Checkbox;
use GDO\UI\GDT_Link;
use GDO\Core\GDT_UInt;
use GDO\UI\GDT_Page;

/**
 * Add IRC chat to your website via Mibbit IRC proxy.
 * 
 * @see GDT_MibbitChat
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_Mibbit extends GDO_Module
{
	##############
	### Module ###
	##############
	public function onLoadLanguage() : void { $this->loadLanguage('lang/mibbit'); }
	
	public function getConfig() : array
	{
		return [
			GDT_Hostname::make('mibbit_host')->notNull()->initial('irc.gizmore.org'),
			GDT_Port::make('mibbit_port')->notNull()->initial('6667'),
			GDT_Checkbox::make('mibbit_tls')->initial('0'),
			GDT_String::make('mibbit_channel')->utf8()->max(128)->pattern("/^[&#]\\S+$/D")->initial("#gdo6"), # could be an IRC dependency but meh
			GDT_String::make('mibbit_nickname')->ascii()->initial(GDO_SITENAME)->max(32),
			GDT_UInt::make('mibbit_nick_counter')->initial('1'),
		    GDT_Checkbox::make('mibbit_fullscreen')->initial('1'),
		    GDT_Checkbox::make('mibbit_left_bar')->initial('1'),
		];
	}
	
	public function cfgNextNickname() : string
	{
		$count = $this->getConfigVar('mibbit_nick_counter');
		$nickname = $this->getConfigVar('mibbit_nickname') . '_' . $count;
		$count++;
		$this->saveConfigVar('mibbit_nick_counter', $count);
		return $nickname;
	}
	
	#############
	### Hooks ###
	#############
	/**
	 * Add chat to left bar
	 */
	public function onInitSidebar() : void
	{
	    if ($this->getConfigValue('mibbit_left_bar'))
	    {
	        $link = GDT_Link::make('link_mibbit')->href(href('Mibbit', 'Chat'));
	        if ($this->getConfigValue('mibbit_fullscreen'))
	        {
	            $link->targetBlank();
	        }
	        GDT_Page::instance()->leftBar()->addField($link);
	    }
	}
	
}
