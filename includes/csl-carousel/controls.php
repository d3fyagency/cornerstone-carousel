<?php

/**
 * Element Controls: CSL Carousel
 */

return array(

	// Max Items

	'max_visible_items' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible items', 'cornerstone' ),
			'tooltip' => __( 'Carousel will automatically show less items to fit smaller screens. Limit the max amount here.', 'cornerstone' ),
		),
    'suggest' => __( '3', 'cornerstone' ),
	),

	// Slide by number of items

	'slide_by' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Slide to no. of items', 'cornerstone' ),
			'tooltip' => __( 'Number of items the carousel scrolls to.', 'cornerstone' ),
		),
		'suggest' => __( '3', 'cornerstone' ),
	),

	// Scroll slide speed

	'scroll_speed' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Scroll speed', 'cornerstone' ),
			'tooltip' => __( 'Carousel will move based on what is specified here. The greater the number the slower the carousel moves.', 'cornerstone' ),
		),
		'suggest' => __( '500', 'cornerstone' ),
	),

	// Auto Play

	'auto_play' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Auto Play', 'cornerstone' ),
			'tooltip' => __( 'Will automatically play the carousel', 'cornerstone' ),
		)
	),

	// Loop (instead of rewind)

	'loop' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Loop', 'cornerstone' ),
			'tooltip' => __( 'Instead of rewinding at the end, simulate eternal looping.', 'cornerstone' ),
		)
	),

	// Auto Vertial Align

	'auto_valign' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Automatically Center Items?', 'cornerstone' ),
			'tooltip' => __( 'Will auto center vertically and horizontally', 'cornerstone' ),
		)
	),

	// Pause on Hover

	'pause_hover' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Pause on Hover?', 'cornerstone' ),
			'tooltip' => __( 'Will pause the carousel when the user hovers their mouse over it.', 'cornerstone' ),
		)
	),

	// Pagination Type

	'pagination_type' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Navigation & Pagination', 'cornerstone' ),
      'tooltip' => __( 'Select the pagination style.', 'cornerstone' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'none',        'label' => __( 'None', 'cornerstone' ) ),
        array( 'value' => 'dots',        'label' => __( 'Dots Only', 'cornerstone' ) ),
        array( 'value' => 'dots_nav',    'label' => __( 'Dots and Prev/Next', 'cornerstone' ) ),
        array( 'value' => 'numbers',     'label' => __( 'Numbers Only', 'cornerstone' ) ),
        array( 'value' => 'numbers_nav', 'label' => __( 'Numbers and Prev/Next', 'cornerstone' ) ),
        array( 'value' => 'prev_next',   'label' => __( 'Prev/Next Only', 'cornerstone' ) )
      ),
		),
	),

	

	// Carousel Items

	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'csl-carousel-item',
			'newTitle' => __('Carousel Item %s', 'cornerstone'),
			'floor' => 2,
			'capacity' => 100,
			'title_field' => 'heading'
		),
		'context' => 'content',
		'suggest' => array(
			array( 'heading' => __('Carousel Item 1', 'cornerstone') ),
			array( 'heading' => __('Carousel Item 2', 'cornerstone') ),
			array( 'heading' => __('Carousel Item 3', 'cornerstone') ),
		)
	)

);