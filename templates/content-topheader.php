	<div id="<?php if ( is_user_logged_in() ) { echo 'registered-user'; } else { echo 'visitor'; } ?>" class="top-header">
		<div class="f-row">

			<div class="small-12 columns">
				<ul class="woo-contact-us">
					<li class="border">
						<p class="woo-link">
						<?php
						$account_url = get_site_url(0,"my-account");
						if( is_user_logged_in() ){
							$current_user = wp_get_current_user();
							$display_name = $current_user->display_name;
							echo "Hello <strong>".$display_name."</strong>";
							$user_ID = $current_user->ID;
							$user = new WP_User( $user_ID );
							if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
								echo " (" . $user->roles[0] .")";
							}

							$logout_url = wp_logout_url();
							$admin_url = get_admin_url();
							echo " | <a rel='nofollow' href='$account_url'>My Account</a>";
							if(is_admin()){
								echo " | <a rel='nofollow' href='$admin_url'>Admin</a>";
							}
							echo " | <a rel='nofollow' href='$logout_url'>Log Out</a>";

						} else {
							$login_url = wp_login_url( tanvas_get_current_page_url() );
							// $help_url = get_site_url(0,"my-account/help");
							$request_url = get_site_url(0, "register");
							echo "<a rel='nofollow' href='$login_url'>Log In</a>";
							echo " | <a rel='nofollow' href='$request_url'>Register</a>";
							// echo " | <a rel='nofollow' href='$help_url'>Account Help</a>";
						}
						?>
						</p>
					</li>
					<li class="woo-items">
						<a class="bag" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
							<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?>
						</a>
						|
						<a class="" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
							<?php echo WC()->cart->get_cart_total(); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
