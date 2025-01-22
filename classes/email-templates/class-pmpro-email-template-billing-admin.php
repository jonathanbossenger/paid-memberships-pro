<?php

class PMPro_Email_Template_Billing_Admin extends PMPro_Email_Template {

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
	 * @since TBD
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
	 * @since TBD
	 *
	 * @return string The email template slug.
	 */
	public static function get_template_slug() {
		return 'billing_admin';
	}

	/**
	 * Get the "nice name" of the email template.
	 *
	 * @since TBD
	 *
	 * @return string The "nice name" of the email template.
	 */
	public static function get_template_name() {
		return __( 'Billing Information Updated (admin)', 'paid-memberships-pro' );
	}

	/**
	 * Get "help text" to display to the admin when editing the email template.
	 *
	 * @since TBD
	 *
	 * @return string The help text.
	 */
	public static function get_template_description() {
		return __( 'Members can update the payment method associated with their recurring subscription. This email is sent to the site administrator as a confirmation of a payment method update.', 'paid-memberships-pro' );
	}

	/**
	 * Get the default subject for the email.
	 *
	 * @since TBD
	 *
	 * @return string The default subject for the email.
	 */
	public static function get_default_subject() {
		return __( 'Billing information has been updated for !!user_login!! at !!sitename!!', 'paid-memberships-pro' );
	}

	public static function get_default_body() {
		return __( '<p>The billing information for !!display_name!! at !!sitename!! has been changed.</p>
<p>Account: !!display_name!! (!!user_email!!)</p>
<p>
	Billing Information:<br />
	!!billing_address!!
</p>

<p>
	!!cardtype!!: !!accountnumber!!<br />
	Expires: !!expirationmonth!!/!!expirationyear!!
</p>

<p>Log in to your WordPress dashboard here: !!login_url!!</p>', 'paid-memberships-pro' );

	}

	/**
	 * Get the email template variables for the email paired with a description of the variable.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public static function get_email_template_variables_with_description() {
		$base_email_template_variables_with_description = array(
			'!!name!!' => __( 'The display name of the user.', 'paid-memberships-pro' ),
			'!!membership_id!!' => __( 'The ID of the membership level.', 'paid-memberships-pro' ),
			'!!membership_level_name!!' => __( 'The name of the membership level.', 'paid-memberships-pro' ),
			'!!user_login!!' => __( 'The username of the user.', 'paid-memberships-pro' ),
			'!!user_email!!' => __( 'The email address of the user.', 'paid-memberships-pro' ),
			'!!display_name!!' => __( 'The display name of the user.', 'paid-memberships-pro' ),
			'!!subject!!' => __( 'The default subject for the email. This will be removed in a future version.', 'paid-memberships-pro' ),
			'!!billing_address!!' => __( 'Billing Info Complete Address', 'paid-memberships-pro' ),
			'!!billing_name!!' => __( 'The billing name of the user.', 'paid-memberships-pro' ),
			'!!billing_street!!' => __( 'The billing street address of the user.', 'paid-memberships-pro' ),
			'!!billing_street2!!' => __( 'The second billing street field address of the user.', 'paid-memberships-pro' ),
			'!!billing_city!!' => __( 'The billing city of the user.', 'paid-memberships-pro' ),
			'!!billing_state!!' => __( 'The billing state of the user.', 'paid-memberships-pro' ),
			'!!billing_zip!!' => __( 'The billing ZIP code of the user.', 'paid-memberships-pro' ),
			'!!billing_country!!' => __( 'The billing country of the user.', 'paid-memberships-pro' ),
			'!!billing_phone!!' => __( 'The billing phone number of the user.', 'paid-memberships-pro' ),
			'!!cardtype!!' => __( 'The type of credit card used.', 'paid-memberships-pro' ),
			'!!accountnumber!!' => __( 'The last four digits of the credit card number.', 'paid-memberships-pro' ),
			'!!expirationmonth!!' => __( 'The expiration month of the credit card.', 'paid-memberships-pro' ),
			'!!expirationyear!!' => __( 'The expiration year of the credit card.', 'paid-memberships-pro' ),
		);

		return $base_email_template_variables_with_description;	
	}

	/**
	 * Get the email address to send the email to.
	 *
	 * @since TBD
	 *
	 * @return string The email address to send the email to.
	 */
	public function get_recipient_email() {
		return get_bloginfo( 'admin_email' );
	}

	/**
	 * Get the name of the email recipient.
	 *
	 * @since TBD
	 *
	 * @return string The name of the email recipient.
	 */
	public function get_recipient_name() {
		//get user by email
		$user = get_user_by( 'email', $this->get_recipient_email() );
		return $user->display_name;	
	}


	/**
	 * Get the email template variables for the email.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public function get_email_template_variables() {
		$order = $this->order;
		$membership_level = pmpro_getLevel( $order->membership_id );
		$user = $this->user;
		$email_template_variables = array(
			'name' => $user->display_name,
			'membership_id' => $membership_level->id,
			'membership_level_name' => $membership_level->name,
			'user_login' => $user->user_login,
			'subject' => $this->get_default_subject(),
			'user_email' => $user->user_email,
			'display_name' => $this->get_recipient_name(),
			'billing_name' => $order->billing->name,
			'billing_street' => $order->billing->street,
			'billing_street2' => $order->billing->street2,
			'billing_city' => $order->billing->city,
			'billing_state' => $order->billing->state,
			'billing_zip' => $order->billing->zip,
			'billing_country' => $order->billing->country,
			'billing_phone' => $order->billing->phone,
			'billing_address' => pmpro_formatAddress( $order->billing->name,
				$order->billing->street,
				$order->billing->street2,
				$order->billing->city,
				$order->billing->state,
				$order->billing->zip,
				$order->billing->country,
				$order->billing->phone ),
			'cardtype' => $order->cardtype,
			'accountnumber' => hideCardNumber( $order->accountnumber ),
			'expirationmonth' => $order->expirationmonth,
			'expirationyear' => $order->expirationyear,
		);
		return $email_template_variables;
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
function pmpro_email_templates_billing_admin( $email_templates ) {
	$email_templates['billing_admin'] = 'PMPro_Email_Template_Billing_Admin';

	return $email_templates;
}
add_filter( 'pmpro_email_templates', 'pmpro_email_templates_billing_admin' );