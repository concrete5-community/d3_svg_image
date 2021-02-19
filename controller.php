<?php 
namespace Concrete\Package\D3SvgImage;

use Package;
use BlockType;

/**
 * Class Controller
 * This class manages startup, installation and upgrade.
 */
class controller extends Package
{
    protected $pkgHandle = 'd3_svg_image';
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.1';

    public function getPackageName()
    {
        return t('SVG Image');
    }

    public function getPackageDescription()
    {
        return t('Installs a block for SVG images');
    }

    public function install()
    {
        $pkg = parent::install();

        BlockType::installBlockTypeFromPackage('d3_svg_image', $pkg);
    }
}
