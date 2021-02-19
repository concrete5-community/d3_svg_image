<?php   
namespace Concrete\Package\D3SvgImage\Block\D3SvgImage;

use Concrete\Core\Block\BlockController;
use File;
use Page;

/**
 * @author akodde
 */
class Controller extends BlockController {
    protected $btInterfaceWidth    = "425";
    protected $btInterfaceHeight   = "450";
	protected $btWrapperClass 	   = 'ccm-ui';
	
	protected $btDefaultSet = "multimedia";
	protected $btTable      = "btD3SvgImage";
	
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
    
    public function getBlockTypeName() 
	{
		$p = \Package::getByHandle('d3_svg_image');
		return $p->getPackageName();
    }
	
    public function getBlockTypeDescription() 
	{
		return t("SVG Image Block");
    }
	
	public function view()
	{
		$svg = File::getByID($this->svg_id);
		
		if ($svg) {
			$this->set('svg', $svg);
		}
		
		$img = File::getByID($this->img_id);
		
		if ($img) {
			$this->set('img', $img);
		}
		
		$link = false;
		if ($this->link_internal) {
			$p = Page::getByID($this->link_internal);
			if ($p->getCollectionID()) {
				$link = $p->getCollectionLink();
			}
		}
		
		if ($this->link_external) {
			$link = $this->link_external;
		}
		
		$this->set('link', $link);
	}
	
	
	/**
	 * @return array
	 **/
	public function getTagOptions() 
	{
		return array(
			"object" => t("Object, with fallback (recommended)"),
			"svg" => t("Svg, inline"),
			"img" => t("Img")
		);
	}
}