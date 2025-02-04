<?php
class PMPro_Email_Template_Checkout_Free_Admin extends PMPro_Email_Template {

	/**
	 * The user object of the user to send the email to.
	 *
	 * @var WP_User
	 */
	protected $user;

	/**
	 * The {@link MemberOrder} object of the order that was updated.
	 *
	 * @var MemberOrder
	 */
	protected $order;


		/**
	 * Constructor.
	 *
	 * @since 3.4
	 *
	 * @param WP_User $user The user object of the user to send the email to.
	 * @param MemberOrder $order The order object that is associated to the member.
	 */
	public function __construct( WP_User $user,  MemberOrder $order ) {
		$this->user = $user;
		$this->order = $order;
	}

	/**
	 * Get the email template slug.
	 *
	 * @since 3.4
	 *
	 * @return string The email template slug.
	 */
	public static function get_template_slug() {
		return 'checkout_free_admin';
	}

	/**
	 * Get the "nice name" of the email template.
	 *
	 * @since 3.4
	 *
	 * @return string The "nice name" of the email template.
	 */
	public static function get_template_name() {
		return esc_html__( 'Checkout - Free (admin)', 'paid-memberships-pro' );
	}


	/**
	 * Get "help text" to display to the admin when editing the email template.
	 *
	 * @since 3.4
	 *
	 * @return string The help text.
	 */
	public static function get_template_description() {
		return esc_html__( 'This is the membership confirmation email sent to the site administrator for every membership checkout that has no charge.', 'paid-memberships-pro' );

	}

	/**
	 * Get the email subject.
	 *
	 * @since 3.4
	 *
	 * @return string The email subject.
	 */
	public static function get_default_subject() {
		return esc_html__( "Member checkout for !!membership_level_name!! at !!sitename!!", 'paid-memberships-pro' );
	}

	/**
	 * Get the email body.
	 *
	 * @since 3.4
	 *
	 * @return string The email body.
	 */
	public static function get_default_body() {
		return wp_kses_post( '<p>There was a new member checkout at !!sitename!!.</p>
<p>Below are details about the new membership account.</p>

<p>Account: !!display_name!! (!!user_email!!)</p>
<p>Membership Level: !!membership_level_name!!</p>
!!membership_expiration!! !!discount_code!!

<p>Log in to your membership account here: !!login_url!!</p>', 'paid-memberships-pro' );
	}

	/**
	 * Get the email address to send the email to.
	 *
	 * @since 3.4
	 *
	 * @return string The email address to send the email to.
	 */
	public function get_recipient_email() {
		return get_bloginfo( 'admin_email' );
	}

	/**
	 * Get the name of the email recipient.
	 *
	 * @since 3.4
	 *
	 * @return string The name of the email recipient.
	 */
	public function get_recipient_name() {
		//get user by email
		$user = get_user_by( 'email', $this->get_recipient_email() );
		return empty( $user->display_name ) ? esc_html__( 'Admin', 'paid-memberships-pro' ) : $user->display_name;
	}


	/**
	 * Get the email template variables for the email paired with a description of the variable.
	 *
	 * @since 3.4
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public static function get_email_template_variables_with_description() {

		return array(
			'!!subject!!' => esc_html__( 'The subject of the email.', 'paid-memberships-pro' ),
			'!!name!!' => esc_html__( 'The name of the email recipient.', 'paid-memberships-pro' ),
			'!!display_name!!' => esc_html__( 'The name of the email recipient.', 'paid-memberships-pro' ),
			'!!user_login!!' => esc_html__( 'The login name of the email recipient.', 'paid-memberships-pro' ),
			'!!membership_id!!' => esc_html__( 'The ID of the membership level.', 'paid-memberships-pro' ),
			'!!membership_level_name!!' => esc_html__( 'The name of the membership level.', 'paid-memberships-pro' ),
			'!!confirmation_message!!' => esc_html__( 'The confirmation message for the membership level.', 'paid-memberships-pro' ),
			'!!membership_cost!!' => esc_html__( 'The cost of the membership level.', 'paid-memberships-pro' ),
			'!!user_email!!' => esc_html__( 'The email address of the email recipient.', 'paid-memberships-pro' ),
			'!!membership_expiration!!' => esc_html__( 'The expiration date of the membership level.', 'paid-memberships-pro' ),
			'!!discount_code!!' => esc_html__( 'The discount code used for the membership level.', 'paid-memberships-pro' ),
		);
	}

	/**
	 * Get the email template variables for the email.
	 *
	 * @since 3.4
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public function get_email_template_variables() {
		global $wpdb;
		$order = $this->order;
		$user = $this->user;
		$membership_level = pmpro_getSpecificMembershipLevelForUser( $user->ID, $order->membership_id );

		$confirmation_message = '';
		$confirmation_in_email = get_pmpro_membership_level_meta( $membership_level->id, 'confirmation_in_email', true );
		if ( ! empty( $confirmation_in_email ) ) {
			$confirmation_message = $membership_level->confirmation;
		}

		$membership_expiration = '';
		$enddate = $wpdb->get_var("SELECT UNIX_TIMESTAMP(CONVERT_TZ(enddate, '+00:00', @@global.time_zone)) FROM $wpdb->pmpro_memberships_users WHERE user_id = '" . $user->ID . "' AND status = 'active' LIMIT 1");
		if( $enddate ) {
			$membership_expiration = "<p>" . sprintf(__("This membership will expire on %s.", 'paid-memberships-pro' ), date_i18n(get_option('date_format'), $enddate)) . "</p>\n";
		}

		$discount_code = '';
		if( $order->getDiscountCode() ) {
			$discount_code = "<p>" . esc_html__("Discount Code", 'paid-memberships-pro' ) . ": " . $order->discount_code->code . "</p>\n";
		}


		$email_template_variables = array(
			'subject' => $this->get_default_subject(),
			'name' => $this->get_recipient_name(),
			'display_name' => $this->get_recipient_name(),
			'user_login' => $user->user_login,
			'membership_id' => $membership_level->id,
			'membership_level_name' => $membership_level->name,
			'membership_level_confirmation_message' => $confirmation_message,
			'membership_cost' => pmpro_getLevelCost( $membership_level ),
			'user_email' => $user->user_email,
			'membership_expiration' => $membership_expiration,
			'discount_code' => $discount_code,
		);

		return $email_template_variables;
	}

}


/**
 * Register the email template.
 *
 * @since 3.4
 *
 * @param array $email_templates The email templates (template slug => email template class name)
 * @return array The modified email templates array.
 */
function pmpro_email_templates_checkout_free_admin( $email_templates ) {
	$email_templates['checkout_free_admin'] = 'PMPro_Email_Template_Checkout_Free_Admin';

	return $email_templates;
}
add_filter( 'pmpro_email_templates', 'pmpro_email_templates_checkout_free_admin' );