function backloginurl(){
    try
    {
    var url = window.location.href;
    if (url == "" || url == null) {
        location.href = "/login.aspx";
    }
    else {
        location.href = "/login.aspx?backurl=" + window.location.href;
    }
}
    catch(e)
    {
        location.href = "/login.aspx";
    }
   
}


function AddFavorite(title, url) {
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}


function SetHome(obj, url) {
    try {
        obj.style.behavior = 'url(#default#homepage)';
        obj.setHomePage(url);
    } catch (e) {
        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            } catch (e) {
                alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
            }
        } else {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【" + url + "】设置为首页。");
        }
    }
}


function UserIslogin() {
    $.ajax({
        type: "POST",
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        url: "/Common/2016/user/Userinfo.ashx",
        headers:GetToken(),
        dataType: 'text',
        success: function (json) {
            jQuery.getScript("/script/2016/json2.js", function (data, status, jqxhr) {
                var data2 = JSON.parse(json);
                if (data2.login == "true") {
                    var u = "亲爱的<span class=\"red\">" + data2.name + "</span>,欢迎您回来!";
                    var h = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"/myvolunteer/main.aspx\" target=\"_blank\"  >个人中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/myvolunteer/Loginout.aspx\" target=\"_blank\" class=\"orange\">安全退出</a>";
                    $("#logintool").html("");
                    $("#logintool").html(h);
                    $("#loginuser").html("");
                    $("#loginuser").html(u);
                }
            });
        }
    });
}

$(document).ready(function () {

    UserIslogin();
});

function GetToken() {
    var token = $("input[name='__RequestVerificationToken']").val();
    var headers = {};
    headers["RequestVerificationToken"] = token;
    return headers;
}
