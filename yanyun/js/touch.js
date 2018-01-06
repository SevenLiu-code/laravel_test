
$(function(){
  $('.start-pictrue').bind('touchstart',function(e){
        startX = e.originalEvent.changedTouches[0].pageX;
        startY = e.originalEvent.changedTouches[0].pageY;
    });
    $(".start-pictrue").bind("touchmove",function(e){
        //获取滑动屏幕时的X,Y
        endX = e.originalEvent.changedTouches[0].pageX;
        endY = e.originalEvent.changedTouches[0].pageY;
        //获取滑动距离
        distanceX = endX-startX;
        distanceY = endY-startY;
        event.preventDefault();
        //判断滑动方向
        if(Math.abs(distanceX)<Math.abs(distanceY) && distanceY<-40){
            $(this).unbind();
            $('.hidden').css({"visibility": "visible"});
            $(this).animate({top: "-100%"}, 400, function(){
               $('body').removeClass('no-over');
            });
            //$(this).addClass('start-hidden');
        }
      });
   $('.menu-icon').click(function(){
      if($(this).hasClass('icon-navicon')){
        $(this).removeClass('icon-navicon').addClass('icon-times');
        $('.menu-main').slideDown(300);
      } else{
        $(this).removeClass('icon-times').addClass('icon-navicon');
        $('.menu-main').slideUp(300);
      }
   });
})
