<?php
namespace Composer\Installers\Test;

use Composer\Installers\PiwigoInstaller;
use Composer\Package\Package;
use Composer\Composer;

class PiwigoInstallerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PiwigoInstaller
     */
    private $installer;

    public function setUp()
    {
        $this->installer = new PiwigoInstaller(
            new Package('NyanCat', '4.2', '4.2'),
            new Composer()
        );
    }

    /**
     * @dataProvider packageNameInflectionProvider
     */
    public function testInflectPackageVars($type, $name, $expected)
    {
        $this->assertEquals(
            $this->installer->inflectPackageVars(array('name' => $name, 'type'=>$type)),
            array('name' => $expected, 'type'=>$type)
        );
    }

    public function packageNameInflectionProvider()
    {
        return array(
            // tests that library names are lowercased
            array(
                'piwigo-library',
                'PHPMailer',
                'phpmailer',
            ),
            // tests that plugin names are not altered
            array(
                'piwigo-plugin',
                'Comments_on_Albums',
                'Comments_on_Albums',
            ),
            array(
                'piwigo-plugin',
                'bootstrapdefault-language-switch-2.7.2.1',
                'bootstrapdefault-language-switch-2.7.2.1',
            ),
            // tests that theme names are not altered
            array(
                'piwigo-theme',
                'simple-white',
                'simple-white',
            ),
            array(
                'piwigo-theme',
                'Sylvia',
                'Sylvia',
            ),
            array(
                'piwigo-theme',
                'stripped_responsive',
                'stripped_responsive',
            ),
        );
    }
}
