<?php
/**
 * Simple_Job_Board_Email_Attachment_Admin Class
 *
 * The admin-specific functionality of the plugin.Defines the plugin name,
 * version, and two examples hooks for how to enqueue the admin-specific
 * stylesheet and javaScript.
 *
 * @link       https://wordpress.org/plugins/simple-job-board
 * @since      2.2.2
 * 
 * @package    Simple_Job_Board_Email_Attachment
 * @subpackage Simple_Job_Board_Email_Attachment/admin
 * @author     PressTigers <support@presstigers.com>
 */

class Simple_Job_Board_Email_Attachment_Admin {

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
     * @param    string    $plugin_name       The name of this plugin.
     * @param    string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        
        /**
         * The class responsible for defining all the plugin settings for email attachment.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-simple-job-board-email-attachment-settings.php';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since   1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Simple_Job_Board_Email_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Simple_Job_Board_Email_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/simple-job-board-email-attachment-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register javaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Simple_Job_Board_Email_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Simple_Job_Board_Email_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/simple-job-board-email-attachment-admin.js', array('jquery'), $this->version, TRUE );
    }

}