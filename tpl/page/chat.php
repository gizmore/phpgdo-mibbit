<?php

use GDO\Core\GDT_Template;
use GDO\Mibbit\GDT_MibbitChat;
use GDO\Mibbit\Module_Mibbit;

$module = Module_Mibbit::instance();
$server = $module->getConfigVar('mibbit_host');
$port = $module->getConfigVar('mibbit_port');
$channel = $module->getConfigVar('mibbit_channel');
$ssl = $module->getConfigValue('mibbit_tls');
$nickname = $module->cfgNextNickname();

$panel = GDT_MibbitChat::make('chat')->server($server)->port($port)->ssl($ssl)->channel($channel)->nickname($nickname);

if ($fullscreen) :
	echo GDT_Template::php('Mibbit', 'page/fullscreen.php', ['panel' => $panel]);
	die();
else :
	echo $panel->render();
endif;
