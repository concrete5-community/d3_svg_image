<?php 
namespace Concrete\Package\D3SvgImage;

use Package;

/**
 * Class Controller
 * This class manages startup, installation and upgrade.
 *
 * @package Concrete\Package\Welzijn
 */
class Controller extends Package 
{
	protected $pkgHandle = 'd3_svg_image';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '0.9.2';

	public function getPackageName() 
	{
		return t("SVG Image");
	}

	public function getPackageDescription() 
	{
		return t("Installs a block for SVG images");
	}

	public function install() 
	{
		$pkg = parent::install();
		
		\BlockType::installBlockTypeFromPackage('d3_svg_image', $pkg);
	}
}
