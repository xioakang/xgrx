<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use think\Request;

//use think\Request;


class Article extends Frontend
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
        $page = request()->param('page','1');
        $limit = request()->param('limit','10');

        $data = Db::name('article')
            ->limit($page,$limit)
            ->order('createtime desc')
            ->select();
        $count = Db::name('article')
            ->count();
        $lists =  [
            'page'=>$page,
            'limit'=>$limit,
            'count'=>$count,
            'data'=>$data,
        ];
        $this->assign('lists',$lists);
        return $this->view->fetch();
    }




}
