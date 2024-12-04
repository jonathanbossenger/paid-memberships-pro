<?php
class PMPro_Email_Template_Membership_Expiring extends PMPro_Email_Template {

	/**
	 * The user object of the user to send the email to.
	 *
	 * @var WP_User
	 */
	protected $user;

	/**
	 * The membership level that expired.
	 *
	 * @var int
	 */
	protected $membership_id;

	/**
	 * Constructor.
	 *
	 * @since TBD
	 *
	 * @param WP_User $user The user object of the user to send the email to.
	 * @param int $membership_id The membership level id of the membership level that expired.
	 */
	public function __construct( WP_User $user, int $membership_id ) {
		$this->user = $user;
		$this->membership_id = $membership_id;
	}

	/**
	 * Get the email template slug.
	 *
	 * @since TBD
	 *
	 * @return string The email template slug.
	 */
	public static function get_template_slug() {
		return 'membership_expiring';
	}

	/**
	 * Get the "nice name" of the email template.
	 *
	 * @since TBD
	 *
	 * @return string The "nice name" of the email template.
	 */
	public static function get_template_name() {
		return __( 'Membership Expiring', 'paid-memberships-pro' );
	}

	/**
	 * Get "help text" to display to the admin when editing the email template.
	 *
	 * @since TBD
	 *
	 * @return string The "help text" to display to the admin when editing the email template.
	 */
	public static function get_template_description() {
		return __( 'This email is sent to the member when their expiration date is approaching, at an interval based on the term of the membership.', 'paid-memberships-pro' );
	}

	/**
	 * Get the default subject for the email.
	 *
	 * @since TBD
	 *
	 * @return string The default subject for the email.
	 */
	public static function get_default_subject() {
		return __( "Your membership at !!sitename!! will end soon", 'paid-memberships-pro' );
	}

	/**
	 * Get the default body content for the email.
	 *
	 * @since TBD
	 *
	 * @return string The default body content for the email.
	 */
	public static function get_default_body() {
		return __( '<p>Thank you for your membership to !!sitename!!. This is just a reminder that your membership will end on !!enddate!!.</p>

		<p>Account: !!display_name!! (!!user_email!!)</p>
		<p>Membership Level: !!membership_level_name!!</p>
		
		<p>Log in to your membership account here: !!login_url!!</p>', 'paid-memberships-pro' );
	}

	/**
	 * Get the email address to send the email to.
	 *
	 * @since TBD
	 *
	 * @return string The email address to send the email to.
	 */
	public function get_recipient_email() {
		return $this->user->user_email;
	}

	/**
	 * Get the name of the email recipient.
	 *
	 * @since TBD
	 *
	 * @return string The name of the email recipient.
	 */
	public function get_recipient_name() {
		return $this->user->display_name;
	}


	/**
	 * Get the email template variables for the email paired with a description of the variable.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public static function get_email_template_variables_with_description() {
		return array(
			'!!subject!!' => __( 'The default subject for the email. This will be removed in a future version.', 'paid-memberships-pro' ),
			'!!header_name!!' => __( 'The name of the email recipient.', 'paid-memberships-pro' ),
			'!!name!!' => __( 'The display name of the user.', 'paid-memberships-pro' ),
			'!!membership_id!!' => __( 'The ID of the membership level.', 'paid-memberships-pro' ),
			'!!membership_level_name!!' => __( 'The name of the membership level.', 'paid-memberships-pro' ),
			'!!user_login!!' => __( 'The username of the user.', 'paid-memberships-pro' ),
			'!!user_email!!' => __( 'The email address of the user.', 'paid-memberships-pro' ),
			'!!display_name!!' => __( 'The display name of the user.', 'paid-memberships-pro' ),
			'!!levels_link!!' => __( 'The URL of the page where users can view available membership levels.', 'paid-memberships-pro' ),
			'!!enddate!!' => __( 'The expiration date of the membership level.', 'paid-memberships-pro' ),
		);
	}

	/**
	 * Get the email template variables for the email.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public function get_email_template_variables() {
		global $wpdb;
		// If we don't have a level ID, query the user's most recently expired level from the database.
		if ( empty( $this->$membership_id ) ) {
			$membership_id = $wpdb->get_var(
				$wpdb->prepare(
					"SELECT membership_id FROM $wpdb->pmpro_memberships_users
					WHERE user_id = %d
					AND status = 'expired'
					ORDER BY enddate DESC
					LIMIT 1",
					$user->ID
				)
			);

			// If we still don't have a level ID, bail.
			if ( empty( $membership_id ) ) {
				$membership_id = 0;
			}
		}

		// Get the membership level object.
		$membership_level = pmpro_getLevel( $membership_id );

		return array(
			"subject" => $this->subject,
			"name" => $user->display_name,
			"user_login" => $user->user_login,
			"header_name" => $user->display_name,
			"display_name" => $user->display_name,
			"user_email" => $user->user_email,
			"levels_link" => pmpro_url("levels"),
			"membership_id" => ( ! empty( $membership_level ) && ! empty( $membership_level->id ) ) ? $membership_level->id : 0,
			"membership_level_name" => ( ! empty( $membership_level ) && ! empty( $membership_level->name ) ) ? $membership_level->name : '[' . esc_html( 'deleted', 'paid-memberships-pro' ) . ']',
			"enddate" => date_i18n( get_option('date_format'), $membership_level->enddate ),
		);
	}
}

/**
 * Register the email template.
 *
 * @since TBD
 *
 * @param array $email_templates The email templates (template slug => email template class name)
 * @return array The modified email templates array.
 */
function pmpro_email_templates_membership_expiring( $email_templates ) {
	$email_templates['membership_expiring'] = 'PMPro_Email_Template_Membership_Expiring';
	return $email_templates;
}
add_filter( 'pmpro_email_templates', 'pmpro_email_templates_membership_expiring' );