<?php 

/*
@package saboresycolores theme

	======================
	SHORTCODE OPTIONS
	======================
*/
function saboresycolores_tooltip( $atts, $content = null ){
	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title'		=> '',
			),
			$atts,
			'tooltip'
		);

	$title = ( $atts['title'] == '' ? $content : $atts['title'] );

	//return HTML
	return '<span class="saboresycolores_tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';
}

add_shortcode( 'tooltip', 'saboresycolores_tooltip' );
/*
	[tooltip placement="top" title="This is the title"]This is the content[/tooltip]
*/

function saboresycolores_popover( $atts, $content = null ){
	/* [popover title="Popover title placement="top" trigger="click" content="This is the popover content"]This is the clickable content[/popover] */

	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title'		=> '',
			'trigger'	=> 'click',
			'content'	=> '',
			),
			$atts,
			'popover'
		);


	//return HTML
	/* <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" data-trigger="click" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button> */
	return '<span class="saboresycolores_popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';
		
	}
	
	add_shortcode( 'popover', 'saboresycolores_popover' );