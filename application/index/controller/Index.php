<?php

namespace app\index\controller;

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
//
//
//        $new_info   = get_info('','','30','','date','30');//最新信息
//        $pro_info   = get_info('','','5','pro','','30');//推荐信息
//        $top_info   = get_info('','','8','top','','30');//置顶信息
//        $hot_info   = get_info('','','10','','click', '10', '','m-d');//热门信息
//
//        $thumb_info = get_info('','','8','','date','9','1');//图片信息
        //最新婚恋
        $catIds = $this->getSubCategoryIds(16);
        $new_info_1   = $this->get_info($catIds,'','10','','date','30');//最新信息

        $new_info_2   = $this->get_info('','','10','','date','30');//最新信息
        $new_info_3   = $this->get_info('','','10','','date','30');//最新信息
        $new_info_4   = $this->get_info('','','10','','date','30');//最新信息
        $new_info_5   = $this->get_info('','','10','','date','30');//最新信息
        $new_info_6   = $this->get_info('','','10','','date','30');//最新信息
        $this->assign([
            'new_info_1'=>$new_info_1,
        ]);
        return $this->view->fetch();
    }

    public function getSubCategoryIds($id = ''){
        $where = [];
        if(!empty($id)){
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
                    $where['is_pro'] = ['>=',time()];
//                    $where .= " and is_pro >=".time();
                    break;

                case 'top':
                    $where['is_top'] = ['>=',time()];
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
        if(empty($order)) $order = "order by createtime desc";
        $res = Db::name('information')
            ->field('id,title')
            ->where($where)
            ->whereOr($whereOr)
            ->order($order)
            ->limit($len)
            ->select();
        return $res;
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
