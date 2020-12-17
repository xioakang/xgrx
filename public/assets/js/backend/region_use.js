define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'region_use/index' + location.search,
                    add_url: 'region_use/add',
                    edit_url: 'region_use/edit',
                    del_url: 'region_use/del',
                    multi_url: 'region_use/multi',
                    import_url: 'region_use/import',
                    table: 'region_use',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {field: 'sname', title: __('Sname'), operate: 'LIKE'},
                        {field: 'level', title: __('Level')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
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
