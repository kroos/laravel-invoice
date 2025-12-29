// jquery
import jQuery from 'jquery/dist/jquery';
window.$ = window.jQuery = jQuery;

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
