<?php

/**
 * Provide a dlls-admin area view for the plugin
 *
 * This file is used to markup the dlls-admin-facing aspects of the plugin.
 *
 * @link       http://dllstudios.com
 * @since      1.0.0
 *
 * @package    Dlls_Cp
 * @subpackage Dlls_Cp/dlls-admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <h2 class="nav-tab-wrapper">General Settings</h2>

    <form method="post" name="dlls_admin_options" action="options.php">
		<?php
		// Grab all options
		$options = get_option( $this->plugin_name );

		$favicon = $options['favicon'];
		$footer  = $options['footer'];
		$toolbar = $options['toolbar'];
		//$dlls_wp_update = $options['dlls_wp_update'];
		$plugin    = $options['plugin'];
		$gutenburg = $options['gutenburg'];

		?>
		<?php
		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
		?>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Enable Custom Favicon For Client Side', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-favicon">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-favicon"
                       name="<?php echo $this->plugin_name; ?> [favicon]"
                       value="1" <?php checked( $favicon, 1 ); ?>/>
                <span><?php esc_attr_e( 'Enable Custom Favicon For Client Side', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Remove Footer Client Side', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-footer">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-footer"
                       name="<?php echo $this->plugin_name; ?> [footer]"
                       value="1" <?php checked( $footer, 1 ); ?>/>
                <span><?php esc_attr_e( 'Remove Footer Client Side', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Remove Toolbar From Client Side', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-toolbar">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-toolbar"
                       name="<?php echo $this->plugin_name; ?> [toolbar]"
                       value="1" <?php checked( $toolbar, 1 ); ?> />
                <span><?php esc_attr_e( 'Remove Toolbar From Client Side', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <!--<fieldset>
            <legend class="screen-reader-text"><span><?php _e('Disable Automataed WordPress Updates', $this->plugin_name);?></span></legend>
            <label for="<?php /*echo $this->plugin_name; */ ?>-dlls_wp_update">
                <input type="checkbox" id="<?php /*echo $this->plugin_name; */ ?>-dlls_wp_update"
                       name="<?php /*echo $this->plugin_name; */ ?> [dlls_wp_update]"
                       value="1" <?php /*checked($dlls_wp_update, 1); */ ?>/>
                <span><?php /*esc_attr_e('Disable Automataed WordPress Updates', $this->plugin_name); */ ?></span>
            </label>
        </fieldset>-->

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Disable Plugin Updates', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-plugin">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-plugin"
                       name="<?php echo $this->plugin_name; ?> [plugin]"
                       value="1" <?php checked( $plugin, 1 ); ?> />
                <span><?php esc_attr_e( 'Disable Plugin Updates', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Disable Gutenberg Editor', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-gutenburg">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-gutenburg"
                       name="<?php echo $this->plugin_name; ?> [gutenburg]"
                       value="1" <?php checked( $gutenburg, 1 ); ?>/>
                <span><?php esc_attr_e( 'Disable Gutenberg Editor', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

		<?php submit_button(__( 'Save all changes', $this->plugin_name), 'primary', 'submit', true ); ?>
    </form>
</div>
