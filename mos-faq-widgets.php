<?php 
function mosfaqs_widgets_init(){	
    register_widget( 'Mos_FAQs_Widget' );	
}
add_action('widgets_init', 'mosfaqs_widgets_init');
class Mos_FAQs_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'mos-faqs-widget-default', // Base ID
			__( 'Mos FAQs' ), // Name
			array( 
				'description' => __( 'Contact info box with address, phone number and email' ), 
				'classname' => 'widget_mos_faqs'
			) // Args
		);
	}
	public function widget( $args, $instance ) {
		?>
		<?php echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
        $limit = $instance['limit'];
        $offset = $instance['offset'];
        $author = $instance['author'];
        $category = $instance['category'];
        $tag = $instance['tag'];
        $orderby = $instance['orderby'];
        $order = $instance['order'];
        $container = $instance['container'];
        $container_class = $instance['container_class'];
        $class = $instance['class'];
        $grid = $instance['grid'];
        $singular = $instance['singular'];
        $pagination = $instance['pagination'];
        $view = $instance['view'];
		?>
			<div class="mos_faqs_default">
			    <?php echo do_shortcode('[mos_faq limit="'.$limit.'" offset="'.$offset.'" author="'.$author.'" category="'.$category.'" tag="'.$tag.'" orderby="'.$orderby.'" order="'.$order.'" container="'.$container.'" container_class="'.$container_class.'" class="'.$class.'" grid="'.$grid.'" singular="'.$singular.'" pagination="'.$pagination.'" view="'.$view.'"]') ?>
			</div>
		<?php echo $args['after_widget'] ?>
        <?php
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	//Generate the form
	public function form( $instance ) {
		?>
		<div>
			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo __( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $instance['title']; ?>">
			</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php echo __( 'Limit:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="number" min="-1" value="<?php echo ($instance['limit'])?$instance['limit']:-1; ?>">
			</p>
			<p class="my-5">Number of post to show per page. Use 'limit'=-1 to show all posts (the 'offset' parameter is ignored with a -1 value).</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php echo __( 'Offset:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" min="0" value="<?php echo ($instance['offset'])?$instance['offset']:0; ?>">
			</p>
			<p class="my-5">Number of post to show per page. Use 'limit'=-1 to show all posts (the 'offset' parameter is ignored with a -1 value).</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>"><?php echo __( 'Author:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author' ) ); ?>" type="text" value="<?php echo ($instance['author'])?$instance['author']:''; ?>">
			</p>
			<p class="my-5">Use author id or comma-separated list of IDs.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php echo __( 'Categories:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" type="number" min="0" value="<?php echo ($instance['category'])?$instance['category']:''; ?>">
			</p>
			<p class="my-5">Category ids from where you like to display posts. Please seperate ids by comma (,).</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>"><?php echo __( 'Tags:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag' ) ); ?>" type="text" value="<?php echo ($instance['tag'])?$instance['tag']:''; ?>">
			</p>
			<p class="my-5">Tag ids from where you like to display posts. Please seperate ids by comma (,).</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php echo __( 'Order:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
			        <option value="DESC" <?php selected($instance['order'],'DESC') ?> >DESC</option>
			        <option value="ASC" <?php selected($instance['order'],'ASC') ?> >ASC</option>
			    </select>
			</p>
			<p class="my-5">Designates the ascending or descending order of the 'orderby' parameter. Defaults to 'DESC'.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php echo __( 'Order By:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat">
			        <option value="none" <?php selected($instance['orderby'],'none') ?> >Default Order</option>				
                    <option value="ID" <?php selected($instance['orderby'],'ID')?> >Order by post id</option>
                    <option value="author" <?php selected($instance['orderby'],'author')?> >Order by author</option>
                    <option value="title" <?php selected($instance['orderby'],'title')?> >Order by title</option>
                    <option value="name" <?php selected($instance['orderby'],'name')?> >Order by name</option>
                    <option value="type" <?php selected($instance['orderby'],'type')?> >Order by post type.</option>
                    <option value="date" <?php selected($instance['orderby'],'date')?> >Order by date.</option>
                    <option value="modified" <?php selected($instance['orderby'],'modified')?> >Order by last modified date.</option>
                    <option value="parent" <?php selected($instance['orderby'],'parent')?> >Order by lparent id.</option>
                    <option value="rand" <?php selected($instance['orderby'],'rand')?> >Random order.</option>
                    <option value="comment_count" <?php selected($instance['orderby'],'comment_count')?> >Order by number of comments.</option>
			    </select>
			    
			</p>
			<p class="my-5">Category ids from where you like to display posts. Please seperate ids by comma (,).</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'container' ) ); ?>"><?php echo __( 'Container:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'container' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'container' ) ); ?>" type="text" value="<?php echo ($instance['container'])?$instance['container']:''; ?>">
			</p>
			<p class="my-5">Whether or not to include wrapper.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'container_class' ) ); ?>"><?php echo __( 'Container Class:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'container_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'container_class' ) ); ?>" type="text" value="<?php echo ($instance['container_class'])?$instance['container_class']:''; ?>">
			</p>
			<p class="my-5">Class that is applied to the container.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>"><?php echo __( 'Class:' ); ?></label> 
			    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" type="text" value="<?php echo ($instance['class'])?$instance['class']:''; ?>">
			</p>
			<p class="my-5">Class that is applied to the faq body.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'grid' ) ); ?>"><?php echo __( 'Grid:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'grid' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'grid' ) ); ?>" class="widefat">
			        <option value="1" <?php selected($instance['grid'],'1') ?> >One Grid</option>
			        <option value="2" <?php selected($instance['grid'],'2') ?> >Two grids</option>
			        <option value="3" <?php selected($instance['grid'],'3') ?> >Three grids</option>
			        <option value="4" <?php selected($instance['grid'],'4') ?> >Four grids</option>
			        <option value="5" <?php selected($instance['grid'],'5') ?> >Five grids</option>
			    </select>
			</p>
			<p class="my-5">Range from 1 to 5.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'singular' ) ); ?>"><?php echo __( 'Singularity:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'singular' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'singular' ) ); ?>" class="widefat">
			        <option value="0" <?php selected($instance['singular'],'0') ?> >No</option>
			        <option value="1" <?php selected($instance['singular'],'1') ?> >Yes</option>
			    </select>
			</p>
			<p class="my-5">Whether or not to allow to open singularly.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'pagination' ) ); ?>"><?php echo __( 'Pagination:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'pagination' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'pagination' ) ); ?>" class="widefat">
			        <option value="0" <?php selected($instance['pagination'],'0') ?> >No</option>
			        <option value="1" <?php selected($instance['pagination'],'1') ?> >Yes</option>
			    </select>
			</p>
			<p class="my-5">Whether or not to include pagination.</p>
		</div>
		<div>
			<p class="my-5">
			    <label for="<?php echo esc_attr( $this->get_field_id( 'view' ) ); ?>"><?php echo __( 'view:' ); ?></label> 
			    <select name="<?php echo esc_attr( $this->get_field_name( 'view' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'view' ) ); ?>" class="widefat">
			        <option value="accordion" <?php selected($instance['view'],'accordion') ?> >Accordion</option>
			        <option value="collapsible" <?php selected($instance['view'],'collapsible') ?> >Collapsible</option>
			        <option value="block" <?php selected($instance['view'],'block') ?> >Block</option>
			    </select>
			</p>
			<p class="my-5">FQAs can be viewwd in like accordion, collapsible or block.</p>
		</div>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	//Save form data into database *Necessary if you want to modify the input values
	// public function update( $new_instance, $old_instance ) {
	// 	$instance = array();
	// 	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	// 	$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
	// 	$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';

	// 	return $instance;
	// }

}