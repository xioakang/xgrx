<?php

namespace app\index\controller;

use app\admin\model\RegionUse;
use app\common\controller\Frontend;
use think\Db;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {


//        $articles   = get_index_article('8');//文章
//        $comments   = get_new_comment('6');//最新评论信息
        $flash = $this->get_flash(6);//焦点图
        $new_info   = $this->get_index_article('10');//最新信息--新闻
        $top_info   = $this->get_info('','','9','top','','15');//置顶信息
        $fac   = $this->get_fac('16');//便民信息

        $info_num    = Db::name('information')->count();   //信息内容数量
        $member_num  = Db::name('user')->count();      //用户
        $article_num = Db::name('artile')->count();     //新闻


        $this->assign([
            'new_info'=>$new_info,
            'top_info'=>$top_info,
            'fac'=>$fac,
            'flash'=>$flash,

            'info_num'=>$info_num,
            'member_num'=>$member_num,
            'article_num'=>$article_num,
        ]);
//
//        $thumb_info = get_info('','','8','','date','9','1');//图片信息
        //最新婚恋  id 2
        //最新 求职招聘 id 7
        $catIds = $this->getSubCategoryIds(7);
        $new_info_1   = $this->get_info($catIds,'','10','','date','15');//最新信息
        //最新 房屋信息 id 1
        $catIds = $this->getSubCategoryIds(1);
        $new_info_2   = $this->get_info($catIds,'','10','','date','15');//最新信息
        //最新 二手买卖 id 3
        $catIds = $this->getSubCategoryIds(3);
        $new_info_3   = $this->get_info($catIds,'','10','','date','15');//最新信息
        //最新 生活服务 id 6
        $catIds = $this->getSubCategoryIds(6);
        $new_info_4   = $this->get_info($catIds,'','10','','date','15');//最新信息
        //最新 教育培训 id 5
        $catIds = $this->getSubCategoryIds(5);
        $new_info_5   = $this->get_info($catIds,'','10','','date','15');//最新信息
        //最新 车辆信息 id 4
        $catIds = $this->getSubCategoryIds(4);
        $new_info_6   = $this->get_info($catIds,'','10','','date','30');//最新信息

        $this->assign([
            'new_info_1'=>$new_info_1,
            'new_info_2'=>$new_info_2,
            'new_info_3'=>$new_info_3,
            'new_info_4'=>$new_info_4,
            'new_info_5'=>$new_info_5,
            'new_info_6'=>$new_info_6,
        ]);
        return $this->view->fetch();
    }


    function get_flash($num = 6)
    {
        $where['starttime'] = ['<=', time()];
        $where['endtime'] = ['>=', time()];
        $res = Db::name('flash')
            ->where($where)
            ->order('id desc')
            ->limit($num)
            ->field('id,image,url')
            ->select();
        return $res;
       /* $data = $this->read_cache('flash');
        if ($data === false) {
            $sql = "select * from {$table}flash order by flaorder,id";
            $res = $db->query($sql);
            $result = array();
            while($row = $db->fetchRow($res)) {
                $image .= $row['image'] . '|';
                $url   .= $row['url'] . '|';
            }
            if(!empty($image) && !empty($url)) {
                $flash['image'] = substr($image,0,-1);
                $flash['url']   = substr($url,0,-1);
            }
            write_cache('flash', $flash);
        } else {
            $flash = $data;
        }
        return $flash;*/
    }


    function get_fac($num='20')
    {
        $res = Db::name('service114')
            ->field('id, name, phone')
            ->select();
        return $res;
    }

    function read_cache($filename)
    {
        $result = array();
        if (!empty($result[$filename])) {
            return $result[$filename];
        }
        $filepath = PHPMPS_ROOT . 'data/phpcache/' . $filename . '.php';
        if (file_exists($filepath)) {
            include_once($filepath);
            $result[$filename] = $data;
            return $result[$filename];
        } else {
            return false;
        }
    }


    function get_index_article($num='5')
    {

        $res = Db::name('artile')
            ->limit($num)
            ->order('id desc')
            ->select();

        $info = [];
        foreach ($res  as $k=>$v){
            $info[$k]['id'] = $v['id'];
            $info[$k]['first_title'] = $v['title'];
            $info[$k]['title'] = $this->cut_str($v['title'],19);
            $info[$k]['createtime'] = date('m-d', $v['createtime']);
            $info[$k]['createtime2'] = date('Y-m-d', $v['createtime']);

        }
        return $info;
    }

    public function getSubCategoryIds($id = ''){
        $where = [];
        if(empty($id)){
            $where['pid'] = ['=', '0'];
        }else{
            $where['pid'] = ['=', $id];
        }
        $res = Db::name('category')
            ->where($where)
            ->column('id');
        if(empty($res)){
            return false;
        }else{
            return implode($res,',');
        }
    }

    public function getCityIds($id = ''){
        $where = [];
        if(!empty($id)){
            $where['pid'] = ['=', '100000'];
        }else{
            $where['pid'] = ['=', $id];
        }
        $res = Db::name('region_use')
            ->where($where)
            ->column('id');
        if(empty($res)){
            return false;
        }else{
            return implode($res,',');
        }
    }

    function get_info($cat='',$area='',$num='10',$protype='',$listtype='',$len='20',$thumb='', $dateformat='y-m-d')
    {

        $whereOr['end_datetime'] = ['=', 0];
        $whereOr['end_datetime'] = ['>=', time()];

        $where['is_check'] = ['=','1'];
        if(!empty($cat)) {
            $where['subcategory_id'] = ['in',$cat];
        }
        if(!empty($area)) {
            $where['city_id'] = ['in',$area];
        }
//        if($thumb=='1') {
//            $where .= " and thumb != '' ";
//        }

        if(!empty($protype)) {
            switch($protype) {
                case 'pro':
                    $where['is_pro_time'] = ['>=',time()];
//                    $where .= " and is_pro >=".time();
                    break;

                case 'top':
                    $where['is_top_time'] = ['>=',time()];
//                    $where .= " and is_top >=".time();
                    break;
            }
        }

        if(!empty($listtype)) {
            switch($listtype) {
                case 'date':
                    $order = "createtime desc";
                    break;

                case 'click':
                    $order = "read_number desc, id desc ";
                    break;
            }
        }
        if(empty($order)) $order = "createtime desc";
        $res = Db::name('information')
            ->field('id, title, city_id, subcategory_id, createtime')
            ->where($where)
            ->whereOr($whereOr)
            ->order($order)
            ->limit($num)
            ->select();
        $info = [];
        foreach ($res  as $k=>$v){
            $info[$k]['id'] = $v['id'];
            $info[$k]['first_title'] = $v['title'];
            $info[$k]['title'] = $this->cut_str($v['title'],$len);
            $info[$k]['city'] = $this->getCityName($v['city_id']);
            $info[$k]['category'] = $this->getCategoryName($v['subcategory_id']);
            $info[$k]['createtime'] = date('m-d', $v['createtime']);

        }
        return $info;
    }

    function getCityName($id){
        $re = Db::name('region_use')->where('id',$id)->column('name');
        if(empty($re)){
            return null;
        }
        return $re[0];
    }

    function getCategoryName($id){
        $re =  Db::name('category')->where('id',$id)->column('name');
        if(empty($re)){
            return null;
        }
        return $re[0];
    }

    function url_rewrite($app, $params, $page = 0, $size = 0)
    {
        global $CFG;
        static $rewrite = NULL;

        if($rewrite === NULL)$rewrite = intval($CFG['rewrite']);
        $args = array('aid'=> 0,'bid'=>'0','cid'=> 0,'vid'=> 0,'eid'=> '0','tid'=>'0','hid'=>'0' );
        @extract(array_merge($args, $params));
        $uri = '';
        switch($app)
        {
            case 'category':
                if (empty($cid) && empty($eid)) {
                    return false;
                } else {
                    if($rewrite) {
                        $uri = 'xk_' . intval($cid);
                        //if(!empty($cid))$uri .= '-id-' . $eid;
                        if(!empty($eid))$uri .= '-area-' . $eid;
                        if(!empty($page))$uri .= '-page-' . $page;
                    }else{
                        $uri = 'category.php?';
                        if($cid && $eid) {
                            $uri .= 'id=' . $cid . '&area=' . $eid;
                        } elseif ($cid && !$eid) {
                            $uri .= 'id=' . $cid ;
                        } elseif (!$cid && $eid) {
                            $uri .= 'area=' . $eid ;
                        }
                        if(!empty($page)) $uri .= '&page=' . $page;
                    }
                }
                break;

            case 'view':
                if(empty($vid)) {
                    return false;
                }else{
                    $uri = $rewrite ? 'xk_info_' . $vid : 'view.php?id=' . $vid;
                }
                break;

            case 'about':
                if(empty($aid)) {
                    return false;
                }else{
                    $uri = $rewrite ? 'about-' . $aid : 'about.php?id=' . $aid;
                }
                break;

            case 'help':
                if($act=='list') {
                    if($rewrite) {
                        $uri = 'help';
                        if($tid)$uri .= '-list-' . $tid;
                        if($page)$uri .= '-page-' . $page;
                    }else{
                        $uri = 'help.php?act=list';
                        if($tid)$uri .= '&typeid=' . $tid;
                        if($page)$uri .= '&page=' . $page;
                    }
                } elseif($act=='view' && $hid) {
                    if($rewrite) {
                        $uri = 'help-view-' . $hid;
                    }else{
                        $uri = 'help.php?act=view&id=' . $hid;
                    }
                }
                break;

            case 'article':
                if($act=='list') {
                    if($rewrite) {
                        $uri = 'article';
                        if($iid)$uri .= '-list-' . $iid;
                        if($page)$uri .= '-page-' . $page;
                    }else{
                        $uri = 'article.php?act=list';
                        if($iid)$uri .= '&typeid=' . $iid;
                        if($page)$uri .= '&page=' . $page;
                    }
                } elseif($act=='view' && $aid) {
                    if($rewrite) {
                        $uri = 'article_' . $aid.'';
                    }else{
                        $uri = 'article.php?act=view&id=' . $aid;
                    }
                }
                break;

            case 'com':
                if($act=='list') {
                    if($rewrite) {
                        $uri = 'com';
                        if(!empty($catid))$uri .= '-list-' . $catid;
                        if(!empty($eid))$uri .= '-area-' . $eid;
                        if(!empty($page))$uri .= '-page-' . $page;
                    }else{
                        $uri = 'com.php?act=list';
                        if(!empty($catid))$uri .= '&catid=' . $catid;
                        if(!empty($eid))$uri .= '&area=' . $eid;
                        if(!empty($page))$uri .= '&page=' . $page;
                    }
                } elseif($act=='view' && $comid) {
                    if($rewrite) {
                        $uri = 'com-view-' . $comid.'';
                    }else{
                        $uri = 'com.php?act=view&id=' . $comid;
                    }
                }
                break;

            default:
                return false;
                break;
        }
        if($rewrite)$uri .= '.html';
        return $uri;
    }

    function cut_str($str, $length, $start=0)
    {
         $charset = 'utf-8';
        if(function_exists("mb_substr")) {
            if(mb_strlen($str, $charset) <= $length) return $str;
            $slice = mb_substr($str, $start, $length, $charset);
        } else {
            $re['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            if(count($match[0]) <= $length) return $str;
            $slice = join("",array_slice($match[0], $start, $length));
        }
        return $slice;
    }


}
