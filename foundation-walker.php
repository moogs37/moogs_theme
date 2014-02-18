<?php
/*
 *	Customize the output of menus for Foundation top bar classes
 */

class top_bar_walker extends Walker_Nav_Menu {

	// Boolean for excluding or including dividers as needed
	private $divider = false;
	
	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
		$element->has_children = !empty($children_elements[$element->ID]);
		$element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
		$element->classes[] = ($element->has_children) ? 'has-dropdown' : '';
		
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	
	function start_el(&$output, $item, $depth, $args) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);	
		
		$output .= ($depth == 0 && $this->divider) ? '<li class="divider"></li>' : '';
		if(!$this->divider) $this->divider = true;
		
		$classes = empty($item->classes) ? array() : (array) $item->classes;	
		
		if(in_array('label', $classes)) {
			$output .= '<li class="divider"></li>';
			$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html);
		}
		
		if ( in_array('divider', $classes) ) {
			$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
		}
		
		$output .= $item_html;
/* 		$output .= ($depth == 0) ? '<li class="divider"></li>' : ''; */
	}
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}
	
}