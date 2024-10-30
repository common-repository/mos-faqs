<?php
/*for more details
https://kb.wpbakery.com/docs/inner-api/vc_map/
https://github.com/proteusthemes/visual-composer-elements
*/
add_action( 'vc_before_init', 'mosFAQsVC' );
function mosFAQsVC() {
	vc_map( array(
		"name" => __( "Mos FAQs", "my-text-domain" ),
		"base" => 'mos_faq',
		"class" => "",
		"category" => __( "Mos Elements", "my-text-domain"),
		'icon'     => plugins_url( 'images/mos-vc.png', __FILE__ ),
				
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "Limit", "my-text-domain" ),
				"param_name" => "limit",
				"value" => __( "-1", "my-text-domain" ),
				"description" => __( "number of post to show per page. Default -1.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Offset", "my-text-domain" ),
				"param_name" => "offset",
				"value" => __( "0", "my-text-domain" ),
				"description" => __( "Number of post to displace or pass over.<br/><b>Warning:</b> Setting the offset parameter overrides/ignores the paged parameter and breaks pagination. The 'offset' parameter is ignored when 'limit'=-1 (show all posts) is used.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-author",
				"admin_label" => false,
				"heading" => __( "Author", "my-text-domain" ),
				"param_name" => "author",
				"description" => __( "Use author id or comma-separated list of IDs.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-category",
				"admin_label" => false,
				"heading" => __( "Categories", "my-text-domain" ),
				"param_name" => "category",
				"description" => __( "Category ids from where you like to display posts. Please seperate ids by comma (,).", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-tag",
				"admin_label" => false,
				"heading" => __( "Tags", "my-text-domain" ),
				"param_name" => "tag",
				"description" => __( "Tag ids from where you like to display posts. Please seperate ids by comma (,).", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-order",
				"admin_label" => false,
				"heading" => __( "Order", "my-text-domain" ),
				"param_name" => "order",
				'value'       => array(
					'DESC'   => 'DESC',
					'ASC'   => 'ASC'
				),
				"description" => __( "Designates the ascending or descending order of the 'orderby' parameter. Defaults to 'DESC'.", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-order",
				"admin_label" => false,
				"heading" => __( "Order by", "my-text-domain" ),
				"param_name" => "orderby",
				'value'       => array(
					'No order'   => 'none',
					'Order by post id'   => 'ID',
					'Order by author'   => 'author',
					'Order by title'   => 'title',
					'Order by name'   => 'name',
					'Order by post type.'   => 'type',
					'Order by date.'   => 'date',
					'Order by last modified date.'   => 'modified',
					'Order by lparent id.'   => 'parent',
					'Random order.'   => 'rand',
					'Order by number of comments.'   => 'comment_count',
				),
				"description" => __( "Sort retrieved posts by parameter. Defaults to 'date (post_date)'. One or more options can be passed.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Container", "my-text-domain" ),
				"param_name" => "container",
				"description" => __( "Whether or not to include wrapper.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Container Class", "my-text-domain" ),
				"param_name" => "container_class",
				"description" => __( "Class that is applied to the container.", "my-text-domain" )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Class", "my-text-domain" ),
				"param_name" => "class",
				"description" => __( "Class that is applied to the faq body.", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"heading" => __( "Grid", "my-text-domain" ),
				"param_name" => "grid",
				'value'       => array(
					'One Grid'   => '1',
					'Two Grids'   => '2',
					'Three Grids'   => '3',
					'Four Grids'   => '4',
					'Five Grids'   => '5',
				),
				"description" => __( "Range from 1 to 5.", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"heading" => __( "Singular", "my-text-domain" ),
				"param_name" => "singular",
				'value'       => array(
					'No'   => '0',
					'Yes'   => '1',
				),
				"description" => __( "Whether or not to allow to open singularly.", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"heading" => __( "Pagination", "my-text-domain" ),
				"param_name" => "pagination",
				'value'       => array(
					'No'   => '0',
					'Yes'   => '1',
				),
				"description" => __( "Whether or not to include pagination.", "my-text-domain" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "mos-faqs-meta mos-faqs-view",
				"admin_label" => false,
				"heading" => __( "View", "my-text-domain" ),
				"param_name" => "view",
				'value'       => array(
					'Accordion'   => 'accordion',
					'Collapsible '   => 'collapsible',
					'Block '   => 'block',
				),
				"description" => __( "faq can be viewwd in like accordion, collapsible or block.", "my-text-domain" )
			),
		)
	));
}