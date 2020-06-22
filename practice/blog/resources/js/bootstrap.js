window._ = require('lodash');

window.$ = window.jQuery = require('jquery')
require('bootstrap/dist/js/bootstrap.bundle')

// 基于 axios 库发起 ajax 请求
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
