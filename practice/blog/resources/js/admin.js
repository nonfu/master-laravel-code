window._ = require('lodash');

window.$ = window.jQuery = require('jquery')
require('bootstrap/dist/js/bootstrap.bundle')
require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing')

require('startbootstrap-sb-admin-2/js/sb-admin-2')

$(function () {
    $('#logoutBtn').click(function () {
        $.ajax({
            url: "/logout",
            type: "POST",
            success: function(resp) {
                var redirectUrl = window.location.domain + resp.responseText;
                window.location = redirectUrl;
            },
            error: function(resp) {
                alert('服务器异常，退出失败，请重试');
            }
        });
    });
});