<?php
namespace Composer\Installers;

/**
 * Class PiwigoInstaller
 *
 * @package Composer\Installers
 */
class PiwigoInstaller extends BaseInstaller
{
    /**
     * @var array
     */
    protected $locations = array(
        'library' => 'include/{$name}/',
        'plugin' => 'plugins/{$name}/',
        'theme' => 'themes/{$name}/',
    );

    /**
     * Format the package name to lowercase if it's a library
     * @param array $vars
     *
     * @return array
     */
    public function inflectPackageVars($vars)
    {
	if ($vars['type'] === 'library') {
	        $vars['name'] = strtolower($vars['name']);
	}

        return $vars;
    }
}
