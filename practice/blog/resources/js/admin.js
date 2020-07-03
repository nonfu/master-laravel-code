window._ = require('lodash');

window.$ = window.jQuery = require('jquery')
require('bootstrap/dist/js/bootstrap.bundle')
require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing')

require('startbootstrap-sb-admin-2/js/sb-admin-2')

$(function () {
    $('.btn-delete').on('click', function () {
        $('#deleteItemId').val($(this).attr('data-id'));
    })
    $('#deleteItemBtn').on('click', function () {
        $('#deleteItemForm').submit();
    });
});