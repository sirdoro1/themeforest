<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'YIT' ) ) {
    exit( 'Direct access forbidden.' );
}


extract( $args );
?>
<label for="<?php echo $id ?>"><?php echo $label ?></label>
<p>
    <input type="text" id="<?php echo $id ?>" name="<?php echo $name ?>" value="<?php echo esc_attr( $value ) ?>" <?php if( isset( $std ) ) : ?>data-std="<?php echo $std ?>"<?php endif ?> class="upload_img_url"/>
    <input type="button" class="button-secondary upload_button" id="<?php echo $id ?>-button" value="<?php _e( 'Upload', 'yit' ) ?>" />
    <span class="desc inline"><?php echo $desc ?></span>
</p>