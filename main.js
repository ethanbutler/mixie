$( document ).ready( function(){

  var x = 0;
  var y = 0;

  function getCurrentFromHash( i ){
    if( !window.location.hash ) return 0;
    var hash = window.location.hash.substr(1);
    var hashArray = hash.split('-');
    return parseInt(hashArray[i]);
  }

  function setImage( elem ){
    var id = elem.data('ids')[elem.data('current')];
    $.get( '/wp-json/img/'+id, function( data ){
      elem.attr('src',data).addClass('loaded');
    } );
  }

  function setHash(){
    var hash = '#';
    $('img').each( function(i){
      if( i>0 ) hash += '-';
      hash += $(this).data('current');
    });
    window.history.pushState( null, null, hash );
  }

  function setCurrent( elem, dir ){
    var position = elem.data('current') + dir;
    if( position < 0 ) position = elem.data('ids').length-1;
    if( position >= elem.data('ids').length ) position = 0;
    elem.data( 'current', position );
    setImage( elem );
    setHash();
  }

  $('img').each( function(i){

    var _this = $(this);

    _this.data( 'index', i );
    _this.data( 'current', getCurrentFromHash( i ) );
    _this.data( 'ids', _this.attr('data-ids').split(',') );

    setImage( _this );

    _this.mousedown( function(e){
      x = e.clientX;
      _this.addClass('active');
    }).mouseleave( function(e){
      _this.removeClass('active');
    }).on( 'touchstart', function(e){
      var touch = e.originalEvent.touches[0]
      x = touch.clientX;
      y = touch.clientY;
    }).mouseup( function(e){
      setCurrent( _this, e.clientX > x ? 1 : -1 )
      _this.removeClass('active');
    }).on( 'touchend', function(e){
      var touch = e.originalEvent.changedTouches[0];
      if( Math.abs( touch.clientY - y ) < ( _this.height() / 3 ) ){
        setCurrent( _this, touch.clientX > x ? 1 : -1 )
      }
    });

  });

} );
