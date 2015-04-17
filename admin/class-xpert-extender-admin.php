<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.themexpert.com
 * @since      1.0.0
 *
 * @package    Xpert_Extender
 * @subpackage Xpert_Extender/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Xpert_Extender
 * @subpackage Xpert_Extender/admin
 * @author     ThemeXpert <support@themexpert.com>
 */
class Xpert_Extender_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function add_custom_meta_boxes()
	{
		// echo "its over";die();
	    add_meta_box( 'prfx_meta', __( 'Meta Box Title', 'prfx-textdomain' ), [$this, 'prfx_meta_callback'], 'page' );
	}

	public function prfx_meta_callback( $post ) {

		$id = $post->ID;
		$tx_position      = get_post_meta($id, 'tx_position', true);

	    ?>
        <style>
        #tx_extender table { width: 100%; }
        #tx_extender td.custom-title { width: 30%; height: 28px; }
        </style>
        <table class="custom-table">          

            <tr>
                <td class="custom-title"><label for="tx_position">Select Addons</label></td>
                <td class="custom-input">
                    <select id="tx_position" class=" tx_feature_layout image-picker show-html" name="tx_position">
                              <option data-addon="gallery" data-img-src=" <?php echo plugins_url('../assets/images/layoutOne.jpg', __FILE__) ?>" value="layoutOne"<?php if($tx_position == 'layoutOne') echo 'selected="selected"'; ?>></option>
                              <option data-addon="slider" data-img-src=" <?php echo plugins_url('../assets/images/layoutTwo.jpg', __FILE__) ?>" value="layoutTwo"<?php if($tx_position == 'layoutTwo') echo 'selected="selected"'; ?>></option>
                              <option data-addon="testimonial" data-img-src=" <?php echo plugins_url('../assets/images/layoutThree.jpg', __FILE__) ?>" value="layoutThree"<?php if($tx_position == 'layoutThree') echo 'selected="selected"'; ?>></option>
                              <option data-addon="hero" data-img-src=" <?php echo plugins_url('../assets/images/layoutFour.jpg', __FILE__) ?>" value="layoutFour"<?php if($tx_position == 'layoutFour') echo 'selected="selected"'; ?>></option>                 
                    </select>
                </td>
            </tr>

			<tr class="addon-settings hide" data-addon="gallery">
				<td>gallery</td>
			</tr>
			<tr class="addon-settings hide" data-addon="testimonial">
				<td>testimonial</td>
			</tr>
			<tr class="addon-settings hide" data-addon="slider">
				<td>slider</td>
			</tr>
			<tr class="addon-settings hide" data-addon="hero">
				<td>hero</td>
			</tr>

        </table>           

        <?php  
	}


	





	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xpert_Extender_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xpert_Extender_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xpert-extender-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name."image-picker-css", plugin_dir_url( __FILE__ ) . 'css/image-picker.css', array(), $this->version, 'all' );
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xpert_Extender_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xpert_Extender_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xpert-extender-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name."image-picker-js", plugin_dir_url( __FILE__ ) . 'js/image-picker.min.js', array( 'jquery' ), $this->version, false );

	}

}
