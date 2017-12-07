function goLink(c_name) {
   var bool = document.cookie.indexOf(c_name + '=');
   var value = null;
   if (bool !== -1) {
      var reg=new RegExp("(^| )"+c_name+"=([^;]*)(;|\x24)");
          var _cookie=reg.exec(document.cookie);
          if(_cookie){
             value = decodeURIComponent(_cookie[2])||"";
             ajax({
                 cache : true,
                 type : "POST",
                 url : "",
                 data : {c_name: value},
                 async : false,
                 dataType:"json",
                 success: function(data) {
                       if(data.code == 200) {
                         return false;
                       }
                     }
                 })
            }
      } else {
        return true;
      }
}
