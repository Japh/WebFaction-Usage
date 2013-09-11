<?php
class WF_Memory_Usage {

	var $data;
	var $max;
	var $min;
	var $base;

	function __construct( $data_file ) {

		$data = file_get_contents( $data_file );
		$data = preg_replace( '/(\s+|\n)/', '', $data );
		$data = explode( ',', $data );
		array_shift( $data );

		$this->data = $data;

		$this->min = 0;
		$this->max = $this->get_max();
		$this->base = 0;

	}

	function get_max() {

		$max = 0;

		foreach ( $this->data as $v ) {

			if ( $v > $max ) {

				$max = $v;

			}

		}

		return $max;

	}

	function set_base( $size = 256 ) {

		if ( $this->max > 0 ) {

			$base = ( (1024 * $size ) / $this->max ) * 1;
			$base = round( $base, 2 );

			$this->base = $base;

		}

	}

	function get_recent_string( $size = 48 ) {

		$recent_data = array_slice( $this->data, $size * -1 );

		return implode( ',', $recent_data );

	}
	
}
