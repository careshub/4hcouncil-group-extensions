<?php
/**
 * 4H Council Group Extensions
 *
 * @package   FourH_Council_Group_Extensions
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 */

/*
 * See https://codex.buddypress.org/developer/group-extension-api/ for arguments and examples.
 */

 if ( class_exists( 'BP_Group_Extension' ) ) : // Recommended, to prevent problems during upgrade or when Groups are disabled

    class FourH_Action_Plan extends BP_Group_Extension {

        function __construct() {

			$args = array(
            	'slug'              => 'action-plan',
           		'name'              => 'Action Plan',
           		'access'			=> 'noone', // Allowed values are
           		'show_tab'			=> 'noone',
           		'nav_item_position' => 1,
           		'screens' => array(
           			// 'edit' shows up in the group's "manage" tab.
	                'edit' => array(
	                    'enabled' => true,
	                    'name' => 'Action Plan',
	                ),
	                // 'create' is used during group creation
	                'create' => array(
	                    'enabled' => false,
	                ),
	                // 'admin' is used in the WP Dashboard group admin panel
	                'admin' => array(
	                    'enabled' => true,
	                    'name' => 'Action Plan',
	                    'metabox_context' => 'normal'
	                )
	            ),
        	);

        	parent::init( $args );

		}

		/**
	     * settings_screen() is the catch-all method for displaying the content
	     * of the edit, create, and Dashboard admin panels
	     */
	    function settings_screen( $group_id = null ) {
	    	$action_plan = groups_get_groupmeta( $group_id, 'action_plan' );
	    	?>
	    	<label for="action-plan-input">Enter your Action Plan</label>
	    	<input id="action-plan-input" type="text" name="action_plan" value="<?php echo $action_plan; ?>">
	    	<?php
	    }

	    /**
	     * settings_screen_save() contains the catch-all logic for saving
	     * settings from the edit, create, and Dashboard admin panels
	     */
	    function settings_screen_save( $group_id = 0 ) {
	    	// Save logic goes here. BP checks capabilities and nonces.
	    	if ( isset( $_POST['action-plan'] ) ) {
	    		groups_update_groupmeta( $group_id, 'action-plan', sanitize_text_field( $_POST['action_plan'] ) );
	    	}
		}

        /**
         * Use this function to display the actual content of your group extension when the nav item is selected.
         */
        function display( $group_id = null ) {
        	// Probably won't use?
        }

    }

    bp_register_group_extension( 'FourH_Action_Plan' );

endif; // class_exists( 'BP_Group_Extension' )
