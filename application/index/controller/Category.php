<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use think\Request;

//use think\Request;


class Category extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function __construct(Request $request = null)
    {
//        $this->request = $request;
        parent::__construct($request);

    }

    public function index()
    {
        //分类id
        $id = request()->param('id','');
        //地区id
        $region = request()->param('region','');
        $page = request()->param('page','1');
        $limit = request()->param('limit','10');

        //分类选择的数据
        $categoryOne = '';
        if($id>=0){
            $categoryOne = Db::name('category')
                ->where('id',$id)
                ->find();
        }
        $this->assign('categoryOne',$categoryOne);
        //展示分类数据
        $categorys = $this->getCategorys($categoryOne);
        $this->assign('categorys',$categorys);

        //地区选中的数据
        $regionOne = '';
        if($region >= 100000){
            $regionOne = Db::name('region_use')
                ->where('id',$id)
                ->find();
        }
        $this->assign('regionOne',$regionOne);
        //展示地区数据
        $regions = $this->getRegions($regionOne);
        $this->assign('regions',$regions);

        //列表信息数据
        $lists = $this->getInformations($categoryOne,$regionOne,$page,$limit);
        $this->assign('lists',$lists);
        return $this->view->fetch();
    }

    //查分类
    public function getCategorys($categoryOne){
        $where = [];
        if(!empty($categoryOne)){
            //pid = 0  代表这个是一级分类
            if($categoryOne['pid'] == 0){
                $where['pid'] = $categoryOne['id'];
            }else{
                $where['id'] = $categoryOne['pid'];
            }
        }
        $result = Db::name('category')
            ->where($where)
            ->select();
        return $result;
    }

    //查地区
    public function getRegions($regionOne = ''){
        $where = [];
        if(!empty($regionOne)){
            //pid = 100000  代表这个是一级分类   100000代表中国
            if($regionOne['pid'] == 100000){
                $where['pid'] = $regionOne['id'];
            }else{
                $where['id'] = $regionOne['pid'];
            }
        }
        $result = Db::name('region_use')
            ->where($where)
            ->select();
        return $result;
    }


    //列表
    public function getInformations($categoryOne='' ,$regionOne='', $page=1, $limit=2){
        $where = [];
        if(!empty($categoryOne)){
            if($categoryOne['pid'] == 0){
                $c_ids = Db::name('category')
                    ->where('pid',$categoryOne['id'])
                    ->column('id');
                if(!empty($c_ids)){
                    $cids = implode($c_ids,',');
                    $where['subcategory_id'] = ['in',$cids];
                }else{
                    return false;
                }
            }else{
                $where['subcategory_id'] = $categoryOne['id'];
            }
        }
        if(!empty($regionOne)){
            if($regionOne['pid'] == 0){
                $g_ids = Db::name('region_use')
                    ->where('pid',$regionOne['id'])
                    ->column('id');
                if(!empty($g_ids)){
                    $gids = implode($g_ids,',');
                    $where['city_id'] = ['in',$gids];
                }else{
                    return false;
                }
            }else{
                $where['city_id'] = $regionOne['id'];
            }
        }
        $data = Db::name('information')
            ->where($where)
            ->limit($page,$limit)
            ->order('id desc')
            ->select();
        $count = Db::name('information')
            ->where($where)
            ->count();
        return [
            'page'=>$page,
            'limit'=>$limit,
            'count'=>$count,
            'data'=>$data,
            ];
    }




}
