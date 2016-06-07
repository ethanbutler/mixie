<?php
get_template_part('header');

$rows = get_field('rows');
foreach( $rows as $row ){
  $options = $row['options'];
  $img_ids = '';
  for( $i=0; $i<count($options); $i++){
    $img_ids .= ($i > 0 ? ',' : '').$options[$i]['ID'];
  }
  echo '<img src="#" data-ids="'.$img_ids.'" />';
}

get_template_part('footer');
