<?php
namespace GDO\Mibbit;

use GDO\Core\GDT_Template;
use GDO\Net\GDT_Url;

/**
 * A Mibbit chat panel.
 *
 * Features: server, port, ssl, channel, nickname
 *
 * @version 6.10
 * @since 6.10
 * @author gizmore
 */
final class GDT_MibbitChat extends GDT_Template
{

	public $server = 'irc.gizmore.org';
	public $port = 6667;

	##############
	### Render ###
	##############
	public $ssl = false;

	############
	### Vars ###
	############
	public $channel = '#help';
	public $nickname = 'GDO_Mobbit';

	public function renderTemplate($f = null): string
	{
		$this->templateModule = 'Mibbit';
		$this->templatePath = 'page/mibbit.php';
		$this->templateVars = [
			'mibbitURL' => $this->mibbitURL(),
		];
		return parent::renderTemplate($f);
	}

	/**
	 * Get mibbit URL for this GDT.
	 *
	 * @return string
	 */
	public function mibbitURL()
	{
		return self::getMibbitURL($this->server, $this->port, $this->channel, $this->ssl, $this->nickname);
	}

	/**
	 * Generate a mibbit url.
	 *
	 * @param string $server
	 * @param int $port
	 * @param string $channel
	 * @param bool $ssl
	 * @param string $nickname
	 *
	 * @return string
	 */
	public static function getMibbitURL(string $server, int $port, string $channel, bool $ssl, string $nickname)
	{
		return sprintf('%s://embed.mibbit.com/?server=%s%%3A%s%d&channel=%s&noServerNotices=true&noServerMotd=true&nick=%s&forcePrompt=true',
			GDT_Url::protocol(),
			$server,
			($ssl ? '%2B' : ''),
			$port,
			urlencode($channel),
			urlencode($nickname)
		);
	}

	public function server(string $server)
	{
		$this->server = $server;
		return $this;
	}

	public function port($port)
	{
		$this->port = $port;
		return $this;
	}

	public function ssl(bool $ssl)
	{
		$this->ssl = $ssl;
		return $this;
	}

	public function channel(string $channel)
	{
		$this->channel = $channel;
		return $this;
	}

	public function nickname(string $nickname)
	{
		$this->nickname = $nickname;
		return $this;
	}

}
