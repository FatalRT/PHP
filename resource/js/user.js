/**
 * Created by 柒祭 on 2018/6/25.
 */
function delete_user(u_id) {
    var url = "<?php echo site_url.('/admin/user_delete');?>";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            u_id: u_id
        },
        dataType: "JSON",
        success: function (data) {
            var i;
            var str = '';
            var state ='';
            for (i = 0; i < data['user_info'].length; i++) {
                if (data['user_info'][i]["state"]==0){
                    state = "屏蔽";
                }else{
                    state = "开启";
                }
                str += "<tr id='"+
                    data['user_info'][i]["u_id"]+
                    "'><td>" +
                    data['user_info'][i]["u_name"] +
                    "</td><td>" +
                    data['user_info'][i]["u_passw"] +
                    "</td><td>" +
                    "<button name='delete' onclick='delete_user("+
                    data['user_info'][i]["u_id"]+
                    ")' class='delete_user' value='" +
                    data['user_info'][i]["u_id"] +
                    "'>" +
                    "删除</button>" +
                    "<button name='edit' onclick='edit_user("+
                    data['user_info'][i]["u_id"]+
                    ")' class='edit_user' value='" +
                    data['user_info'][i]["u_id"] + "'>" +
                    "编辑</button>" +
                    "</td></tr>";
            }
            $("#user_info").html(str);
        },
        error: function (msg)
        {//ajax请求失败后触发的方法
            alert("错误");//弹出错误信息
        }
    });
}
//编辑用户
function edit_user(u_id) {
    if(confirm("确定删除"))
    var url = "<?php echo site_url.('/admin/get_user_info');?>";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            uid: u_id
        },
        dataType: "JSON",
        success: function (data) {
            var str = "<td>" +
                "<input type='text' required='required' name='username' placeholder='用户名' " +
                "value = '" +
                data['special_user'][0]['u_name'] +
                "'>" +
                "</td><td>" +
                "<input type='text' required='required' name='password' placeholder='密码' " +
                "value='" +
                data['special_user'][0]['u_passw'] +
                "'>" +
                "</td><td>" +
                "<select name='userstate' class='user_state_select'>" +
                "<option value='1' >开启</option>" +
                "<option value='0' >屏蔽</option>" +
                "</select>" +
                "</td><td>" +
                "<button name='save' onclick='edit_user_save(" +
                data['special_user'][0]['u_id'] +
                ")' class='edit_user_save' " +
                "value='" +
                data['special_user'][0]['u_id'] +
                "'>" +
                "保存" +
                "</button></td>";

            $("#" + data['special_user'][0]['u_id']).html(str);
        },
        error: function (msg) {//ajax请求失败后触发的方法
            alert("错误");//弹出错误信息
        }
    });
}

//保存修改的用户
function edit_user_save(u_id) {
    var username = document.getElementById(u_id).getElementsByTagName("input")[0].value;
    var password = document.getElementById(u_id).getElementsByTagName("input")[1].value;
    var select = $('.user_state_select option:selected').val();
    var url = "<?php echo site_url('/admin/user_change');?>";
    var str = '';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            uid: u_id,
            username: u_name,
            password: u_passw,
            select: select
        },
        dataType: "JSON",
        success: function (data) {
            var state = '';
            if (data['special_user'][0]["state"]==0){
                state = "屏蔽";
            }else{
                state = "开启";
            }
            str += "<td>" +
                data['special_user'][0]["u_name"] +
                "</td><td>" +
                data['special_user'][0]["u_passw"] +
                "</td><td>" +
                state +
                "</td><td>" +
                "<button name='delete' onclick='delete_user("+
                data['special_user'][0]["u_id"]+
                ")' class='delete_user' value='" +
                data['special_user'][0]["u_id"] +
                "'>" +
                "删除</button>" +
                "<button name='edit' onclick='edit_user("+
                data['special_user'][0]["u_id"]+
                ")' class='edit_user' value='" +
                data['special_user'][0]["u_id"] + "'>" +
                "编辑</button>" +
                "</td>";

            $("#" + data['special_user'][0]['u_id']).html(str);
        },
        error: function (msg) {//ajax请求失败后触发的方法
            alert("错误");//弹出错误信息
        }
    });
}

