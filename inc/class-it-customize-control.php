<?php
/**
 * class-it-customize-control.php - ITSSUE Customize Control class
 * 
 * @package theme-itssue
 */
require_once( ABSPATH. WPINC. '/class-wp-customize-control.php' );

class IT_Customize_Control extends WP_Customize_Control {
  protected function render_content() {
    switch( $this->type ) {
      case 'dropdown-categories':
        ?>
        <label>
        <?php if ( ! empty( $this->label ) ) : ?>
          <span class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
          </span>
        <?php endif;
        if ( ! empty( $this->description ) ) : ?>
          <span class="description customize-control-description">
            <?php echo $this->description; ?>
          </span>
        <?php endif; ?>

        <?php $dropdown = wp_dropdown_categories(
          array(
            'orderby' => 'slug',
            'show_count' => true,
            'hide_empty' => false,
            'echo' => false,
            'selected' => $this->value(),
            'hierarchical' => true,
            'name' => '_customize-dropdown-categories-' . $this->id,
          )
        );

        $dropdown = str_replace( '<select',
          '<select ' . $this->get_link(), $dropdown );
        echo $dropdown;
        ?>
        </label>
        <?php
        break;

      default:
        parent::render_content();
        break;
    }
  }
}