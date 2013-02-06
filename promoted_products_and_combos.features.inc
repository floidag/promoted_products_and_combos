<?php
/**
 * @file
 * promoted_products_and_combos.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function promoted_products_and_combos_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function promoted_products_and_combos_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function promoted_products_and_combos_image_default_styles() {
  $styles = array();

  // Exported image style: full_width.
  $styles['full_width'] = array(
    'name' => 'full_width',
    'effects' => array(
      18 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '652',
          'height' => '435',
        ),
        'weight' => '1',
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function promoted_products_and_combos_node_info() {
  $items = array(
    'combo' => array(
      'name' => t('Combo'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'promoted_product' => array(
      'name' => t('Promoted product'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

/**
 * Implements hook_theme().
 */
function promoted_products_and_combos_theme($existing, $type, $theme, $path) {
  return array(
    'node--combo' => array(
      'render element' => 'elements',
      'path' => drupal_get_path('module', 'promoted_products_and_combos') . '/theme',
      'template' => 'node--combo',
    ),
    'node--promoted-product' => array(
      'render element' => 'elements',
      'path' => drupal_get_path('module', 'promoted_products_and_combos') . '/theme',
      'template' => 'node--pomoted-product',
    ),
  );
}