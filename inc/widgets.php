<?php	
/**
*	
*	@package saboresycolorestheme
	
	========================
		WIDGET CLASS
	========================
*/
class Saboresycolores_Profile_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'saboresycolores-profile-widget',
			'description' => 'Widget personalizado perfil Sabores&Colores',
		);

		parent::__construct( 'saboresycolores_profile', 'Perfil Sabores&Colores', $widget_ops );		
	}
	
	//back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No hay opciones para este Widget!</strong><br/>Puedes controlar los campos de este Widget a través de <a href="./admin.php?page=ejc_saboresycolores">esta página</a></p>';
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$picture = esc_attr( get_option( 'profile_picture' ) );
		$company_name = esc_attr( get_option( 'company_name' ) );
		$company_description = esc_attr( get_option( 'company_description' ) );
		
		$twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
		$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
		$instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
		
		echo $args['before_widget'];
		?>
		<div class="text-center">
			<div class="image-container">
				<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
			</div>
			<h1 class="saboresycolores-username"><?php print $company_name; ?></h1>
			<h2 class="saboresycolores-description"><?php print $company_description; ?></h2>
			<div class="icons-wrapper">
				<?php if( !empty( $twitter_icon ) ): ?>
					<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="saboresycolores-icon-sidebar dashicons dashicons-twitter"></span></a>
				<?php endif; 
				if( !empty( $instagram_icon ) ): ?>
					<a href="https://instagram.com/<?php echo $instagram_icon; ?>" target="_blank"><span class="saboresycolores "></span></a>
				<?php endif; 
				if( !empty( $facebook_icon ) ): ?>
					<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="saboresycolores-icon-sidebar dashicons dashicons-facebook"></span></a>
				<?php endif; ?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
}
add_action( 'widgets_init', function() {
register_widget( 'saboresycolores_Profile_Widget' );
} );


class Saboresycolores_Footer_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'saboresycolores-footer-widget',
			'description' => 'Widget personalizado footer Sabores&Colores',
		);

		parent::__construct( 'saboresycolores_footer', 'Footer Sabores&Colores', $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No hay opciones para este Widget!</strong><br/>Puedes controlar los campos de este Widget a través de <a href="./admin.php?page=ejc_saboresycolores_footer">esta página</a></p>';
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$address = esc_attr(get_option('company_address'));
		$phone = esc_attr(get_option('company_phonenumber'));
		$celphone = esc_attr(get_option('company_celphone'));
		$city = esc_attr(get_option('company_city'));
				
		echo $args['before_widget'];
		?>
		<div class="text-center">
		<?php echo '<h2 class="saboresycolores-widget-title">Dónde nos encuentras?</h2>' ?>
			<ul>
				<li class="saboresycolores-address"><?php print $address; ?></li>
				<li class="saboresycolores-phone"><?php print $phone; ?></li>
				<li class="saboresycolores-celphone"><?php print $celphone; ?></li>
				<li class="saboresycolores-city"><?php print $city; ?></li>
			</ul>			
		</div>
		<?php
		echo $args['after_widget'];
	}
	
}
add_action( 'widgets_init', function() {
register_widget( 'saboresycolores_Footer_Widget' );
} );