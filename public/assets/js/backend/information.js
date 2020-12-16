define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'information/index' + location.search,
                    add_url: 'information/add',
                    edit_url: 'information/edit',
                    del_url: 'information/del',
                    multi_url: 'information/multi',
                    import_url: 'information/import',
                    table: 'information',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weigh',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'category_name', title: __('Category'), operate: 'LIKE'},
                        {field: 'subcategory_name', title: __('Subcategory'), operate: 'LIKE'},
                        {field: 'region.mername', title: __('Province_city'), operate: 'LIKE'},
                        {field: 'title', title: __('Title'), operate: 'LIKE'},
                        {field: 'contacts_name', title: __('Contacts_name'), operate: 'LIKE'},
                        {field: 'contacts_phone', title: __('Contacts_phone'), operate: 'LIKE'},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        recyclebin: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    'dragsort_url': ''
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: 'information/recyclebin' + location.search,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'title', title: __('Title'), align: 'left'},
                        {
                            field: 'deletetime',
                            title: __('Deletetime'),
                            operate: 'RANGE',
                            addclass: 'datetimerange',
                            formatter: Table.api.formatter.datetime
                        },
                        {
                            field: 'operate',
                            width: '130px',
                            title: __('Operate'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'Restore',
                                    text: __('Restore'),
                                    classname: 'btn btn-xs btn-info btn-ajax btn-restoreit',
                                    icon: 'fa fa-rotate-left',
                                    url: 'information/restore',
                                    refresh: true
                                },
                                {
                                    name: 'Destroy',
                                    text: __('Destroy'),
                                    classname: 'btn btn-xs btn-danger btn-ajax btn-destroyit',
                                    icon: 'fa fa-times',
                                    url: 'information/destroy',
                                    refresh: true
                                }
                            ],
                            formatter: Table.api.formatter.operate
                        }
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});

function set_next_input(obj) {
    var value_id = $('#c-province_id').val();
    //重新赋值 查询条件
    $("#c-city_id_text").data('selectPageObject').option.params = function () {
        return {custom: {level: 2,pid: value_id}};
    };
    //重新赋值 查询url
    $("#c-city_id_text").data("selectPageObject").option.data = "region/index";
    //清除之前选中的数据
    $('#c-city_id_text').selectPageClear();
}

function set_next_input_category(obj) {
    var value_id = $('#c-category_id').val();
    //重新赋值 查询条件
    $("#c-subcategory_id_text").data('selectPageObject').option.params = function () {
        return {custom: {type: 'information',pid: value_id}};
    };
    //重新赋值 查询url
    $("#c-subcategory_id_text").data("selectPageObject").option.data = "category/selectpage";
    //清除之前选中的数据
    $('#c-subcategory_id_text').selectPageClear();
}


