// jQuery(document).load(function() {
//     var $window = jQuery(window);
//     var $stickyEl = jQuery('.toplabel');
//     var elTop = $stickyEl.offset().top;
//     var $scroll = null;

//     $window.scroll(function() {
//         elTop = $stickyEl.offset().top;
//         if ($window.scrollTop() > elTop && $scroll == null){
//             $scroll = $stickyEl.clone();
//             $scroll.toggleClass('toplabelsticky', true);
//             //$scroll = $("<div></div>").appendTo($scroll);
//             $scroll.css('width', '100%');
//             $scroll.appendTo('body');
//         } else if ($scroll != null && $window.scrollTop() <= elTop) {
//             $scroll.remove();
//             $scroll=null;
//         }
//     });
// });

var $window = jQuery(window),
       $stickyEl = jQuery('.toplabel'),
       elTop = $stickyEl.offset().top,
    $scroll = null;

   $window.scroll(function() {
        elTop = $stickyEl.offset().top;
        if($window.scrollTop() > elTop && $scroll==null){
        $scroll=$stickyEl.clone();
        $scroll.toggleClass('toplabelsticky',true);
        //$scroll = $("<div></div>").appendTo($scroll);
        $scroll.css('width','100%');
        $scroll.appendTo('body');
    }else if($scroll!=null && $window.scrollTop() <=elTop){
        $scroll.remove();
        $scroll=null;
    }
    });