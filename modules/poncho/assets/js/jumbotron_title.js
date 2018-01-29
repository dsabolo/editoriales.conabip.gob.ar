jQuery(document).ready(
  function(){

    //Moviendo el title al jumbotron
    jQuery('#jumbotronTitle').html(jQuery('#block-poncho-theme-page-title h1').html());

    //Usando imagen del nodo como fondo del jumbotron
    if(jQuery('.node__content img').attr('src')!=""){
     jQuery('section.jumbotron').css('background','#fff');
     jQuery('section.jumbotron').css('background-image', 'url('+jQuery('main img').attr('src')+')');
     jQuery('section.jumbotron').css('background-size', 'cover');
     jQuery('section.jumbotron').css('background-position', 'center center');
     jQuery('section.jumbotron').removeClass('jumboarticle');
     jQuery('main img:first').hide(); //Ocultando la primer imagen, ya que se utiliza en el header
  }

  //Attaching breadcrumb to jumbotron
  jQuery('section.jumbotron').html(
    '<div class="jumbotron_bar"><div class="container"><div class="row"><div class="col-md-12">'
    + '<ol class="breadcrumb pull-left">'
    + jQuery('.region.region-breadcrumb ol').html()
    + '</ol>'
    + '</div></div></div></div>'
    + jQuery('section.jumbotron').html()
  )

  //Hidden repeated elements
  jQuery('.region.region-breadcrumb').hide();
  jQuery('#block-poncho-theme-page-title').hide();

  }
);
