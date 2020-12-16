<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class ArtileCategory extends Model
{

    use SoftDelete;



    // 表名
    protected $name = 'artile_category';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [

    ];


    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }


    public function admin()
    {
        return $this->belongsTo('admin', 'admin_id')->setEagerlyType(0);
    }







}
