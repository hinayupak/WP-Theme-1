<?php
//Internal css and js
add_action('admin_head', 'ts_styles_scripts');

function ts_styles_scripts() { ?>
	<style type="text/css">
		.theme-settings-container input:not([type=button]):not([type=reset]):not([type=submit]) {
			width: 100%;
		}
	</style>
<?php } 

$t_setting = 'theme_settings';

//register settings
function theme_settings_init(){
	global $t_setting;
    register_setting( $t_setting, $t_setting );
}

//add settings page to menu
function add_settings_page() {
	add_menu_page( __( 'Theme Settings' ), __( 'Theme Settings' ), 'manage_options', 'settings', 'theme_settings_page');
}

// wysiwyg
function us_partners_cb() {
    $us_partners_desc = get_option( 'us_partners_desc' );
    echo wp_editor( $us_partners_desc, 'uspartnersdesc', array('textarea_name' => 'us_partners_desc')  );
}

//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

//start settings page
function theme_settings_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	global $t_setting;
?>

<div class="theme-settings-container">

	<form method="post" enctype=”multipart/form-data”  action="options.php">

		<?php settings_fields( $t_setting ); ?>

		<?php $options = get_option( $t_setting ); ?>
 
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>

		<h2><?php printf( __( '%s Theme Settings', 'YourTheme' ), ucfirst($theme_name) ); ?></h2>
		<?php

		//show saved options message
		if ( false !== $_REQUEST['settings-updated'] ) : ?>
			<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
				<p><strong>Options saved.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>

		<?php endif; ?>
		<div class="postbox ts-container">
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row"><h2>Site Information</h2></th>
							<td></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Logo URL</label></th>
							<td>
								<p><input type="url" name="<?php echo $t_setting."[theme-logo]"; ?>" value="<?php echo $options['theme-logo']; ?>" placeholder="Input complete URL"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Phone Number</label></th>
							<td>
								<p><input type="text" name="<?php echo $t_setting."[theme-phone-number]"; ?>" value="<?php echo $options['theme-phone-number']; ?>"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Address Information</label></th>
							<td>
								<p><textarea name="<?php echo $t_setting."[theme_address]"; ?>" class="large-text" id="<?php echo $t_setting."[theme_address]"; ?>" cols="78" rows="8"><?php echo $options['theme_address']; ?></textarea></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Fax Number</label></th>
							<td>
								<p><input type="text" name="<?php echo $t_setting."[theme-fax-number]"; ?>" value="<?php echo $options['theme-fax-number']; ?>"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><h2>Social Media</h2></th>
							<td></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Facebook</label></th>
							<td>
								<p><input type="url" name="<?php echo $t_setting."[theme-facebook]"; ?>" value="<?php echo $options['theme-facebook']; ?>" placeholder="Input complete URL"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Twitter</label></th>
							<td>
								<p><input type="url" name="<?php echo $t_setting."[theme-twitter]"; ?>" value="<?php echo $options['theme-twitter']; ?>" placeholder="Input complete URL"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">LinkedIn</label></th>
							<td>
								<p><input type="url" name="<?php echo $t_setting."[theme-linkedin]"; ?>" value="<?php echo $options['theme-linkedin']; ?>" placeholder="Input complete URL"></p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="<?php echo $t_setting."[header_scripts]"; ?>">Pinterest</label></th>
							<td>
								<p><input type="url" name="<?php echo $t_setting."[theme-pinterest]"; ?>" value="<?php echo $options['theme-pinterest']; ?>" placeholder="Input complete URL"></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>		
		</div>

		<p><input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit"></p>

	</form>

</div><!-- END wrap -->

<?php

}



?>