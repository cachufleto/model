<?php
/**
 * @file
 * Add stylesheets that are only needed when ifocop is the enabled theme.
 *
 * Don't do something this dumb in your sub-theme. Stylesheets should be added
 * using your sub-theme's .info file. If you desire styles that apply
 * conditionally, you can conditionally add a "body class" in the
 * preprocess_page function. For an example, see how wireframe styling is
 * handled in ifocop_preprocess_html() and wireframes.css.
 */

/**
 * If the user is silly and enables ifocop as the theme, manually add some stylesheets.
 */
function _ifocop_preprocess_html(&$variables, $hook) {
  // Add ifocop's stylesheets manually instead of via its .info file. We do not
  // want the stylesheets to be inherited from ifocop since it becomes impossible
  // to re-order the stylesheets in the sub-theme.
  $directory = drupal_get_path('theme', 'ifocop') . '/ifocop-internals/css/';
  $stylesheet = (theme_get_setting('ifocop_layout') == 'ifocop-fixed-width') ? 'styles-fixed.css' : 'styles.css';
  drupal_add_css($directory . $stylesheet, array('group' => CSS_THEME, 'every_page' => TRUE));

  // Sub-themes after 7.x-5.1 remove these files, but we can't remove them using
  // ifocop.info since it will break sub-themes built with 7.x-5.0/5.1.
  drupal_add_css($directory . 'system.messages.css', array('group' => CSS_THEME, 'every_page' => TRUE));
  drupal_add_css($directory . 'system.theme.css', array('group' => CSS_THEME, 'every_page' => TRUE));
}
