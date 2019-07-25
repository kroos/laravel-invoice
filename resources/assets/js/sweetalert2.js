/**
 * We'll load jQuery and the sweetalert2 jQuery plugin which provides support
 * for JavaScript based sweetalert2 features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// not jquery dependency
try {
	window.swal = require('sweetalert2');
} catch (e) {}