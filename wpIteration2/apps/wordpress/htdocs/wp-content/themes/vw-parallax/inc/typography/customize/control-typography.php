<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Parallax_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-parallax' ),
				'family'      => esc_html__( 'Font Family', 'vw-parallax' ),
				'size'        => esc_html__( 'Font Size',   'vw-parallax' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-parallax' ),
				'style'       => esc_html__( 'Font Style',  'vw-parallax' ),
				'line_height' => esc_html__( 'Line Height', 'vw-parallax' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-parallax' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-parallax-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-parallax-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-parallax' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-parallax' ),
        'Acme' => __( 'Acme', 'vw-parallax' ),
        'Anton' => __( 'Anton', 'vw-parallax' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-parallax' ),
        'Arimo' => __( 'Arimo', 'vw-parallax' ),
        'Arsenal' => __( 'Arsenal', 'vw-parallax' ),
        'Arvo' => __( 'Arvo', 'vw-parallax' ),
        'Alegreya' => __( 'Alegreya', 'vw-parallax' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-parallax' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-parallax' ),
        'Bangers' => __( 'Bangers', 'vw-parallax' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-parallax' ),
        'Bad Script' => __( 'Bad Script', 'vw-parallax' ),
        'Bitter' => __( 'Bitter', 'vw-parallax' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-parallax' ),
        'BenchNine' => __( 'BenchNine', 'vw-parallax' ),
        'Cabin' => __( 'Cabin', 'vw-parallax' ),
        'Cardo' => __( 'Cardo', 'vw-parallax' ),
        'Courgette' => __( 'Courgette', 'vw-parallax' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-parallax' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-parallax' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-parallax' ),
        'Cuprum' => __( 'Cuprum', 'vw-parallax' ),
        'Cookie' => __( 'Cookie', 'vw-parallax' ),
        'Chewy' => __( 'Chewy', 'vw-parallax' ),
        'Days One' => __( 'Days One', 'vw-parallax' ),
        'Dosis' => __( 'Dosis', 'vw-parallax' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-parallax' ),
        'Economica' => __( 'Economica', 'vw-parallax' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-parallax' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-parallax' ),
        'Francois One' => __( 'Francois One', 'vw-parallax' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-parallax' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-parallax' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-parallax' ),
        'Handlee' => __( 'Handlee', 'vw-parallax' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-parallax' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-parallax' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-parallax' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-parallax' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-parallax' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-parallax' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-parallax' ),
        'Kanit' => __( 'Kanit', 'vw-parallax' ),
        'Lobster' => __( 'Lobster', 'vw-parallax' ),
        'Lato' => __( 'Lato', 'vw-parallax' ),
        'Lora' => __( 'Lora', 'vw-parallax' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-parallax' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-parallax' ),
        'Merriweather' => __( 'Merriweather', 'vw-parallax' ),
        'Monda' => __( 'Monda', 'vw-parallax' ),
        'Montserrat' => __( 'Montserrat', 'vw-parallax' ),
        'Muli' => __( 'Muli', 'vw-parallax' ),
        'Marck Script' => __( 'Marck Script', 'vw-parallax' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-parallax' ),
        'Open Sans' => __( 'Open Sans', 'vw-parallax' ),
        'Overpass' => __( 'Overpass', 'vw-parallax' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-parallax' ),
        'Oxygen' => __( 'Oxygen', 'vw-parallax' ),
        'Orbitron' => __( 'Orbitron', 'vw-parallax' ),
        'Patua One' => __( 'Patua One', 'vw-parallax' ),
        'Pacifico' => __( 'Pacifico', 'vw-parallax' ),
        'Padauk' => __( 'Padauk', 'vw-parallax' ),
        'Playball' => __( 'Playball', 'vw-parallax' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-parallax' ),
        'PT Sans' => __( 'PT Sans', 'vw-parallax' ),
        'Philosopher' => __( 'Philosopher', 'vw-parallax' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-parallax' ),
        'Poiret One' => __( 'Poiret One', 'vw-parallax' ),
        'Quicksand' => __( 'Quicksand', 'vw-parallax' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-parallax' ),
        'Raleway' => __( 'Raleway', 'vw-parallax' ),
        'Rubik' => __( 'Rubik', 'vw-parallax' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-parallax' ),
        'Russo One' => __( 'Russo One', 'vw-parallax' ),
        'Righteous' => __( 'Righteous', 'vw-parallax' ),
        'Slabo' => __( 'Slabo', 'vw-parallax' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-parallax' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-parallax'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-parallax' ),
        'Sacramento' => __( 'Sacramento', 'vw-parallax' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-parallax' ),
        'Tangerine' => __( 'Tangerine', 'vw-parallax' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-parallax' ),
        'VT323' => __( 'VT323', 'vw-parallax' ),
        'Varela Round' => __( 'Varela Round', 'vw-parallax' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-parallax' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-parallax' ),
        'Volkhov' => __( 'Volkhov', 'vw-parallax' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-parallax' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-parallax' ),
			'100' => esc_html__( 'Thin',       'vw-parallax' ),
			'300' => esc_html__( 'Light',      'vw-parallax' ),
			'400' => esc_html__( 'Normal',     'vw-parallax' ),
			'500' => esc_html__( 'Medium',     'vw-parallax' ),
			'700' => esc_html__( 'Bold',       'vw-parallax' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-parallax' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-parallax' ),
			'italic'  => esc_html__( 'Italic', 'vw-parallax' ),
			'oblique' => esc_html__( 'Oblique', 'vw-parallax' )
		);
	}
}
