<?php   
defined('C5_EXECUTE') or die("Access Denied.");

// Application/Service/FileManager.php
$al = Core::make('helper/concrete/asset_library');

// Form/Service/Widget/PageSelector.php
$ps = Core::make('helper/form/page_selector');
?>

<div class="d3-svg-image-edit">
	<div class="form-group">
	    <?php   
		echo $form->label('tag', t('Embedding Tag').' *');
		?>
	
		<div class="input">
			<?php  
			echo $form->select('tag', $controller->getTagOptions(), $tag);
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('svg_id', t('SVG Image').' *');
		?>
	
		<div class="input">
			<?php  
			$bf = null;
			if ($svg_id > 0) { 
				$bf = File::getByID($svg_id);
			}
		
			$args = array();
			$args['filters'] = array( array( 'field' => 'type', 'type' => \Concrete\Core\File\Type\Type::T_IMAGE ) );
			echo $al->file('svg_id', 'svg_id', t('Choose Image'), $bf, $args);
			?>
		</div>
	</div>

	<div class="form-group wrap-svg-code">
	    <?php   
		echo $form->label('svg_code', t('or paste SVG code'));
		?>
	
		<div class="input">
			<?php  
			echo $form->textarea('svg_code', $svg_code);
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('img_id', t('Fallback Image'));
		?>
	
		<div class="input">
			<?php  
			$bf = null;
			if ($svg_id > 0) { 
				$bf = File::getByID($img_id);
			}
		
			echo $al->image('img_id', 'img_id', t('Choose Image'), $bf);
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('link_internal', t('Choose Page'));
		?>
	
		<div class="input">
			<?php  
			echo $ps->selectPage('link_internal', $link_internal);
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('link_external', t('or enter URL'));
		?>
	
		<div class="input">
			<?php  
			echo $form->text('link_external', $link_external, array('placeholder' => 'http://'));
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('link_target', t('Link Target'));
		?>
	
		<div class="input">
			<?php  
			echo $form->select('link_target', array('_self' => t('Same window'), '_blank' => t('New window')), $link_target);
			?>
		</div>
	</div>

	<div class="form-group">
	    <?php   
		echo $form->label('alt_text', t('ALT text'));
		?>
	
		<div class="input">
			<?php  
			echo $form->text('alt_text', $alt_text);
			?>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	$('.d3-svg-image-edit').on('change', '#tag', function(e) {
		console.log(this.value);
		if (this.value == "svg") {
			$(".wrap-svg-code").show();
		} else {
			$(".wrap-svg-code").hide();
		}
	});
	
	$("#tag").trigger('change');
});
</script>