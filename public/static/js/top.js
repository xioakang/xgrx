/**
* JavaScript脚本实现回到页面顶部示例
* @param acceleration 速度
* @param stime 时间间隔 (毫秒)
**/
function gotoTop(acceleration,stime) {
   acceleration = acceleration || 0.1;
   stime = stime || 10;
   var x1 = 0;
   var y1 = 0;
   var x2 = 0;
   var y2 = 0;
   var x3 = 0;
   var y3 = 0;
   if (document.documentElement) {
       x1 = document.documentElement.scrollLeft || 0;
       y1 = document.documentElement.scrollTop || 0;
   }
   if (document.body) {
       x2 = document.body.scrollLeft || 0;
       y2 = document.body.scrollTop || 0;
   }
   var x3 = window.scrollX || 0;
   var y3 = window.scrollY || 0;

   // 滚动条到页面顶部的水平距离
   var x = Math.max(x1, Math.max(x2, x3));
   // 滚动条到页面顶部的垂直距离
   var y = Math.max(y1, Math.max(y2, y3));

   // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
   var speeding = 1 + acceleration;
   window.scrollTo(Math.floor(x / speeding), Math.floor(y / speeding));

   // 如果距离不为零, 继续调用函数
   if(x > 0 || y > 0) {
       var run = "gotoTop(" + acceleration + ", " + stime + ")";
       window.setTimeout(run, stime);
   }
}
$(function(){
    innerHtml();
});
function innerHtml(){
    var tophtml='\
    <div id="top_bar" class="clearfix">\
      <div class="change_city">\
        <script type="text/javascript" src="date.js"></script>\
      </div>\
      <div class="change_city" style="padding:5px 18px">\
        <iframe width="300" scrolling="no" height="20" frameborder="0" allowtransparency="true"\
          src="javascript:;"></iframe></div>\
      <div class="site_service">\
        <font color="red"><a href="member-login_httpxk1.xookee.cnin.html">会员登录</a></font>&nbsp;\
        <font color="red"><a href="member-register.html">会员注册</a></font>&nbsp;\
      </div>\
    </div>\
    <div id="header" class="clearfix">\
      <div class="logo"><a href=""><img src="..ogo.png"></a></div>\
      <div class="post">\
        <div class="post_top1">\
          <a href="post.html" class="p_btn1">发布信息</a><a href="postcom.html" class="p_btn2">商家入驻</a></div>\
      </div>\
      <div class="quick_menu">\
        <div class="search_s">\
          <form name="form" action="search.php" method="post"><input type="text" name="keywords" id="keywords"\
              class="inputtop" maxlength="40"><input type="submit" name="search" value="&nbsp;&nbsp;" class="btn-s">\
          </form>\
        </div>\
      </div>\
    </div>\
    <div class="nav">\
      <div class="nav_menu">\
        <ul id="nav_menu_ul">\
          <li><a href="../index/index.html" class="hover">首页</a></li>\
          <li><a href="../category/category.html?cateid=1">招聘求职</a></li>\
          <li><a href="../category/category.html?cateid=2">房屋租售</a></li>\
          <li><a href="../category/category.html?cateid=3">二手买卖</a></li>\
          <li><a href="../category/category.html?cateid=4">生活服务</a></li>\
          <li><a href="../category/category.html?cateid=5">教育培训</a></li>\
          <li><a href="../category/category.html?cateid=6">车辆买卖</a></li>\
          <li><a href="../category/category.html?cateid=7">交友征婚</a></li>\
          <li style="float:right"><a href="../com/com.html" class="hover">黄页</a></li>\
          <li style="float:right"><a href="../article/article.html" class="hover2">新闻</a></li>\
        </ul>\
      </div>\
    </div>\
    <!-- 主导航结束 -->\
    <div class="sub_nav">\
      <div class="inner">\
        <ul class="clearfix">\
          <li class="jlebm"><b>地区导航</b></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=8">广州</a></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=9">深圳</a></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=10">佛山</a></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=11">东莞</a></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=12">珠海</a></li>\
          <li class="jlebm"><a href="../category/category.html?cateid=13">惠州</a></li>\
          <li style="float:right"><a href="#" target="_self">文字广告</a></li>\
          <li style="float:right"><a href="#" target="_self">靓号出售</a></li>\
          <li style="float:right"><a href="#" target="_blank">酒吧转让</a></li>\
          <li style="float:right"><a href="#" target="_blank">地皮出售</a></li>\
          <li style="float:right"><a href="#" target="_blank">火锅店免费试吃</a></li>\
        </ul>\
      </div>\
    </div>';
    var bottomhtml='<div class="foot_info">\
    <div class="foot_line">\
      <p class="foot_nav">\
        <a href="../about/about.html?aboutid=1" target="_blank">关于我们</a>\
        |\
        <a href="../about/about.html?aboutid=2" target="_blank">免责申明</a>\
        |\
        <a href="../about/about.html?aboutid=3" target="_blank">广告服务</a>\
        |\
        <a href="../about/about.html?aboutid=4" target="_blank">帮助中心</a>\
        |\
        <a href="../about/about.html?aboutid=5" target="_blank">联系我们</a>\
        | <a\
          onclick="this.style.behavior=\'url(#default#homepage)\';this.setHomePage(\'http://xk1.xookee.cn\');return(false);"\
          style="cursor:pointer;">设为首页</a> | <a \
          href="javascript:window.external.AddFavorite(\'http://xk1.xookee.cn\',\'讯客分类信息网\')">加为收藏</a> | <a\
          href="index1.html">手机版</a>\
      </p>\
    </div>\
    <div style="margin-top:20px; line-height:170%;">\
      <a href="" target="_blank"><strong>讯客分类信息网</strong></a>&copy; 2014-2020 http://xk1.xookee.cn Inc.\
      <br>\
      法律声明：本站免费提供信息交流，交易者自行分辨信息真假，如有损失，本站概不负责。谢谢您对本站的支持！!!&nbsp;&nbsp;<br> ICP备案号：<a href="javascript:;"\
        target="_blank">粤icp123456789号</a>&nbsp;&nbsp; <br>\
      <span class="tel_qq">网站在线客服QQ:\
        <a href="javascript:;" target="_blank"><img style="display:inline" src="..a-2286349413451.jpg"\
            border="0" alt="在线咨询">123456789</a>\
        <img src="..i.gif">\
      </span>\
    </div>\
    <noscript><iframe src="javascript:;"></iframe></noscript>\
  </div>\
  <div class="floating_ck">\
    <dl>\
      <dt></dt>\
      <dd class="words"><a href="post.html"><span>发布信息</span></a></dd>\
      <!--<dd class="qrcord"><span>扫一扫</span>-->\
        <div class="floating_left floating_ewm"><i></i></div>\
      </dd>\
      <dd class="return"><span onclick="gotoTop();return false;">返回顶部</span></dd>\
    </dl>\
  </div>';

    $('#topall').html(tophtml);
    $('#footer').html(bottomhtml);
}
