<?php

namespace Drupal\poncho\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "JumbotronTitle_block",
 *   admin_label = @Translation("Poncho: Título en area Jumbotron"),
 * )
 */
class JumbotronTitleBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {

    $node = \Drupal::routeMatch()->getParameter('node');



    if($node) {
      $nid = $node->id();
      if($node->get('body')->summary!=""){
        $extra = $node->get('body')->summary;
      }
      else {
        $extra =  Unicode::substr( $node->get('body')->value, 0, Unicode::strpos($node->get('body')->value, '.'));
      }
      $extra = '<p><strong>'.$extra.'</strong></p>';
        }
    else {

     // $request = \Drupal::request();
     // $route_match = \Drupal::routeMatch();
     //  $title = \Drupal::service('title_resolver')->getTitle($request, $route_match->getRouteObject());
     // $extra = "";
     $title = "";
     $extra = "";
    }

    return array(
        '#cache' => array('max-age'=>0),
        '#type' => 'markup',
        //'#label'  => t('Demo'),
         '#attached' => array(
            'library' => array(
              'poncho/jumbotron',
            ),
          ),
        '#markup' => '
      <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
          <h1 id="jumbotronTitle"></h1>
          '.$extra.'
        </div>
      </div>',

      );
    }

}
