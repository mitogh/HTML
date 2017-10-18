<?php namespace Crisoforo\HTML;

/**
 * Class to generate attributes based on an array of values, helpful to keep the code en an more
 * easy way to read.
 */
class Attributes {
	/**
	 * Function that renders the attributes into the page.
	 *
	 * @param Array $values An associative array representing the attributes and values.
	 */
	public static function render( $values = [] ) {
		$storage = [];
		foreach ( $values as $attr => $value ) {
			if ( is_null( $value ) || false === $value ) {
				continue;
			}

			if ( is_array( $value ) ) {
				// Do it recursive.
				self::render( $value );
				continue;
			}

			echo sprintf( '%s="%s"',
				esc_html( $attr ),
				esc_attr( $value )
			);
		}
	}
}
