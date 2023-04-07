<?php

class Mona_Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div>\n";
	}

}

class Mona_Walker_Nav_Menu extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='submenu'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;

		if ( $args->walker->has_children && $depth == 0 ) { //Nếu là thằng đầu tiên
			$output .= "<li class='menu-item parent dropdown 1" . implode( " ", $item->classes ) . "'>";
		} else if ( $args->walker->has_children && $depth != 0 ) { //nếu nó là cha khác thằng đuầ
			$output .= "<li class='submenu-item menu-item parent dropdown" . implode( " ", $item->classes ) . "'>";
		} else if ( $depth != 0 ) {
			$output .= "<li class='submenu-item menu-item dropdown" . implode( " ", $item->classes ) . "'>";
		} else {
			$output .= "<li class='menu-item" . implode( " ", $item->classes ) . "'>";
		}

		//Add SPAN if no Permalink
		if ( $permalink && $permalink != '#' ) {
			$output .= '<a class="menu-link" href="' . $permalink . '">';
		} else {
			$output .= '<a class="menu-link" href="javascript:;">';
		}

		$output .= $title;

		if ( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</a>';
		}

		if ( $args->walker->has_children ) { //them icon vao cho no
			$output .= '<span class="dropdown-icon expand-icon"><i class="ri-arrow-down-s-line"></i></span>';
		}


	}
}
