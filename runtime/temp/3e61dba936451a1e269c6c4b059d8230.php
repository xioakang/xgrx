<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\waibao\xgrx\public/../application/index\view\index\index.html";i:1608366563;}*/ ?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>=分类信息网_广州同城生活门户，生活信息全网罗！_http://xk1.xookee.cn</title>
  <meta name="Keywords" content="分类信息网,二手买卖,供求信息,信息发布网,免费发布信息,生活信息,行业信息">
  <meta name="Description" content="=分类信息网为网民提供出租、招聘、求购、求租、搬迁、运输、二手交易、招生培训、婚介交友等各类信息的发布和查询,是您生活的好伴侣！">
  <link href="static/css/index.css" type="text/css" rel="stylesheet">
  <script src="static/js/common.js"></script>
  <script type="text/javascript" src="assets/libs/web/jquery-1.7.2.js"></script>
  <script src="static/js/jquery.js"></script>
  <script src="static/js/hdpic.js"></script>
  <script type="text/javascript" src="static/js/navtop.js"></script>
  <script type="text/javascript" src="static/js/top.js"></script>


</head>

<body>

  <script src="static/js/baidutiaozhuan.js" type="text/javascript"></script>
  <script type="text/javascript">uaredirect("/wap/");</script>
  <div class="topall" id="topall">11111111111111</div>



  <!-- 主体 -->
  <!-- <div style="width:1200px; margin:10px auto;">
    <script type="text/javascript" src="../../static/js/yanshi.js"></script>
  </div> -->

  <div class="adbox_1"><a href="javascript:;" target="_blank"><img src="../../static/picture/200104101613voimzl.gif"
        border="0" width="1200" height="90alt=横幅一"></a>

  </div>
  <script type="text/javascript" src="static/js/myfocus-2.0.4.min.js"></script>
  <style type="text/css">
    #myFocus3 {
      width: 500px;
      height: 266px;
      margin: 10px;
    }
  </style>
  <script type="text/javascript">
    //设置
    myFocus.set({
      id: 'myFocus3',//ID
      pattern: 'mF_slide3D'//风格
    });
  </script>
  <table width="1200" border="0" cellspacing="0" cellpadding="0" align="center" class="title_index_top">
    <tr>
      <td width="350" valign="top" class="title_index_1">
        <div id="top_news">
          <h6><span><a href="article.html">更多>></a></span><a href="#"></a></h6>
          <ul>



            <?php if(is_array($new_info) || $new_info instanceof \think\Collection || $new_info instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info) ? array_slice($new_info,0,10, true) : $new_info->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><span style="float:right; font-size:12px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span><a
                    href="article-view_15.html" target="_blank" title="<?php echo $vo['first_title']; ?>"><?php echo $vo['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

          </ul>
        </div>
      </td>
      <td width="520" valign="top" class="top_nv_bar">
        <div class="font001">共有信息<span>
            <?php echo $info_num; ?> </span>条，资讯<span>
            <?php echo $member_num; ?> </span>条，会员<span>
            <?php echo $article_num; ?> </span>位</div>
        <div id="myFocus3">
          <div class="pic">
            <ul>
              <?php if(is_array($flash) || $flash instanceof \think\Collection || $flash instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($flash) ? array_slice($flash,0,6, true) : $flash->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <li><a href="<?php echo $vo['url']; ?>"><img width="500" height="286" src="<?php echo $vo['image']; ?>"></a></li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
        </div>
        <div style=" clear:both;"></div>
      </td>
      <td width="330" valign="top" class="title_index_2">
        <div class="tel_qq" style="float:right">我要置顶：<a href="javascript:;" target="_blank"><img
              src="../../static/picture/pa-2286349413452.jpg" border="0" alt="在线咨询">123456789</a>

          &nbsp;&nbsp;</div>
        <div id="index_ding">
          <ul>

            <?php if(is_array($top_info) || $top_info instanceof \think\Collection || $top_info instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($top_info) ? array_slice($top_info,0,10, true) : $top_info->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>"
                         class="red"><?php echo $vo['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>




          </ul>
        </div>
      </td>
    </tr>
  </table>
  <div class="adbox_1">
    <script type="text/javascript">
      panshi_a = "3356737536_2557419520_1";
      panshi_b = "1200_80_10";
    </script>
    <script type="text/javascript" src="../../static/js/show_ps3.js"></script>

  </div>
  <div style="margin:0px auto; width:100%;">
    <div class="info_box">
      <div id="info_list" style="border-right:#e8e8e8 1px solid">
        <h6><span><a href="category-1.html">更多最新</a></span><a href="category-1.html">招聘求职</a></h6>
        <ul>

          <?php if(is_array($new_info_1) || $new_info_1 instanceof \think\Collection || $new_info_1 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_1) ? array_slice($new_info_1,0,10, true) : $new_info_1->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </div>
      <div id="info_list" style="border-right:#e8e8e8 1px solid">
        <h6><span><a href="category-2.html">更多最新</a></span><a href="category-2.html">房屋信息</a></h6>
        <ul>
          <?php if(is_array($new_info_2) || $new_info_2 instanceof \think\Collection || $new_info_2 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_2) ? array_slice($new_info_2,0,10, true) : $new_info_2->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
      </div>
      <div id="info_list" style="border-right:#e8e8e8 0px solid; ">
        <h6><span><a href="category-3.html">更多最新</a></span><a href="category-3.html">二手买卖</a></h6>
        <ul>

          <?php if(is_array($new_info_3) || $new_info_3 instanceof \think\Collection || $new_info_3 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_3) ? array_slice($new_info_3,0,10, true) : $new_info_3->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
      </div>
    </div>
    <div class="ggbox2"><a href="javascript:;" target="_blank"><img src="../../static/picture/140916043137jjoing.jpg"
          border="0" width="985" height="70alt=首页通栏3"></a>

    </div>
    <div class="info_box">
      <div id="info_list" style="border-right:#e8e8e8 1px solid;">
        <h6><span><a href="category-4.html">更多最新</a></span><a href="category-4.html">生活服务</a></h6>
        <ul>

          <?php if(is_array($new_info_4) || $new_info_4 instanceof \think\Collection || $new_info_4 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_4) ? array_slice($new_info_4,0,10, true) : $new_info_4->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
      </div>
      <div id="info_list" style="border-right:#e8e8e8 1px solid;">
        <h6><span><a href="category-5.html">更多最新</a></span><a href="category-5.html">教育培训</a></h6>
        <ul>
          <?php if(is_array($new_info_5) || $new_info_5 instanceof \think\Collection || $new_info_5 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_5) ? array_slice($new_info_5,0,10, true) : $new_info_5->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
      </div>
      <div id="info_list">
        <h6><span><a href="category-6.html">更多最新</a></span><a href="category-6.html">车辆信息</a></h6>
        <ul>
          <?php if(is_array($new_info_6) || $new_info_6 instanceof \think\Collection || $new_info_6 instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_info_6) ? array_slice($new_info_6,0,10, true) : $new_info_6->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><span style="float:right; font-size:11px;font-family:Arial; padding-left:10px;"><?php echo $vo['createtime']; ?></span>
            <font color="#ff6600"><?php echo $vo['city']; ?></font>&nbsp;&nbsp;<a href="@xxxxx.html" target="_blank" title="<?php echo $vo['first_title']; ?>" class="red"><?php echo $vo['title']; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </div>
    </div>
  </div>
  <div class="ggbox2"> <a href="javascript:;" target="_blank"><img src=""
        border="0" width="985" height="70alt=首页通栏4"></a>
  </div>


  <table width="1200" border="0" cellspacing="0" cellpadding="0" align="center" class="mar10">
    <tr>
      <td>
        <div class="mod_3">
          <div class="hd clearfix">
            <div class="dh_bm"><b class="left">便民电话114 · 同城服务</b><span class="yellow tel_qq"
                style="color:#f50;">想让您的电话显示在这里吗？请联系客服&nbsp;<a href="javascript:;" target="_blank"><img
                    style="display:inline" src="../../static/picture/pa-2286349413451.jpg" border="0"
                    alt="在线咨询">123456789</a>

                &nbsp; 特惠100元/年 &nbsp; &nbsp;<a href="bianmin.html">更多电话&gt;&gt;</a></span></div>
          </div>
          <div class="bd">
            <div id="bmdh" class="area">
              <ul class="list_114 clearfix">

                <?php if(is_array($fac) || $fac instanceof \think\Collection || $fac instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($fac) ? array_slice($fac,0,14, true) : $fac->slice(0,14, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="bg<?php echo $i; ?>"><i><?php echo $vo['name']; ?><br>
                  <?php echo $vo['phone']; ?></i></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>


              </ul>
            </div>
          </div>
        </div>


        <div class="friendLink">
          <div class="bd">
            <div class="text"> 友情连接：
              <a href="javascript:;" target="_blank" title="分类信息网">分类信息网</a>&nbsp;&nbsp;

              <a href="javascript:;" target="_blank" title="百度娘们">百度娘们</a>&nbsp;&nbsp;

              <a href="javascript:;" target="_blank" title="4554545454">4554545454</a>&nbsp;&nbsp;

            </div>
          </div>
        </div>
      </td>
    </tr>
  </table>


  <!-- 主体 结束 -->

  <!-- 页脚 -->
  <div id="clear" style="display:none;">
    <script src="../../static/js/stat-5679645_5679645_pic.js" language="JavaScript"></script>
  </div>
  <div class="dibtbg"></div>
  <div id="footer" class="clearfix">

    <!-- 页脚 结束 -->
  </div>
</body>

</html>
