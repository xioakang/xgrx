<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use Monolog\Logger;
use function PHPSTORM_META\elementType;
use think\Db;

/**
 *
 *
 * @icon fa fa-circle-o
 */
class RegionUse extends Backend
{

    /**
     * RegionUse模型对象
     * @var \app\admin\model\RegionUse
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\RegionUse;

    }

    public function import()
    {
        parent::import();
    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */


    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = false;
        //设置过滤方法
        $this->request->filter(['strip_tags', 'trim']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $list = $this->model

                    ->where($where)
                    ->order($sort, $order)
                    ->paginate($limit);

            foreach ($list as $row) {
                $row->visible(['id','name','sname','level']);

            }

            $result = array("total" => $list->total(), "rows" => $list->items());

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $par = $this->request->post("row/a");
//            $province_id = $this->request->post("row/a",'');
            $province_id = empty($par['province_id'])? '': $par['province_id'];
            $city_id = empty($par['city_id']) ? '': $par['city_id'];
            $paramss = [];
            if(!empty($par['province_id'])){
                $province = $this->model->where('id',$province_id)->find();
                if(empty($province)){
                    $paramss[] = Db::table('fa_region')->where('id',$province_id)->find();
                }
            }

            if(!empty($par['city_id'])){
                $city = $this->model->where('id',$city_id)->find();
                if(empty($city)){
                    $paramss[] = Db::table('fa_region')->where('id',$city_id)->find();
                }
            }
            $result = $this->model->insertAll($paramss);
            if ($result !== false) {
                $this->success();
            } else {
                $this->error(__('No rows were inserted'));
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

}
