/**
 * We'll load jQuery and the formvalidation jQuery plugin which provides support
 * for JavaScript based formvalidation features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery =

    require('jquery');
    require('datatables.net');
    require('datatables.net-bs');
    require('datatables.net-responsive');
    require('datatables.net-responsive-bs');
} catch (e) {}