<?php

class Mona_hook {

    public function __construct() {
        add_filter('pre_get_posts', [$this, 'prefix_limit_post_types_in_search']);
        add_filter('wpcf7_autop_or_not', '__return_false');
    }

    public function prefix_limit_post_types_in_search($query) {
        if (!is_admin()) {
            $query->set('ignore_sticky_posts', true);

            $query->set('ignore_sticky_posts', true);
            $ptype = $query->get('post_type', true);
            $ptype = (array) $ptype;
            if ($query->is_main_query() && $query->is_tax('gifts')) {
                $ptype[] = 'gift';
                $query->set('post_type', $ptype);
                $query->set('posts_per_page', 6);
            }
            
            $query->set('ignore_sticky_posts', true);
            $ptype = $query->get('post_type', true);
            $ptype = (array) $ptype;
            if ($query->is_main_query() && $query->is_tax('events')) {
                $ptype[] = 'event';
                $query->set('post_type', $ptype);
                $query->set('posts_per_page', 6);
            }
        }

        return $query;
    }

}

new Mona_hook();
