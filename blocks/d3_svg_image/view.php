<?php  
defined('C5_EXECUTE') or die("Access Denied.");

if (!$svg && !$svg_code) {
    echo t("Please select an SVG image");

    return false;
}

if ($svg) {
    $svg_path = $svg->getVersion()->getRelativePath();

    if (!$svg_path) {
        echo t("This image is not available (anymore)");

        return false;
    }
}

if ($img) {
    $img_path = $img->getVersion()->getRelativePath();

    if ($img_path) {
        $fallback_tag = '<img src="'.$img_path.'" alt="'.h($alt_text).'" />';
    }
}

if ($link) {
    echo '<a class="d3-svg-image-link" href="'.$link.'" target="'.$link_target.'">';
}

switch ($tag) {
    case 'object':
        echo '<object type="image/svg+xml" data="'.$svg_path.'">';

        if (isset($fallback_tag)) {
            echo $fallback_tag;
        }

        echo '</object>';
    break;
    case 'img':
        echo '<img src="'.$svg_path.'" alt="'.h($alt_text).'" />';
    break;
    case 'svg':
        if ($svg_code) {
            echo $svg_code;
        } elseif ($svg) {
            echo $svg->getVersion()->getFileContents();
        }
    break;
}

if ($link) {
    echo '</a>';
}
