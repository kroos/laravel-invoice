import '../../node_modules/jquery-ui/dist/jquery-ui';
(function ($) {
	// Iterate over all methods in jQuery UI's namespace
	$.each($.ui, function (name) {
			// Check if it's a widget and create a prefixed alias
			if ($.fn[name]) {
					$.fn[`jqueryui${name.charAt(0).toUpperCase() + name.slice(1)}`] = $.fn[name];
			}
	});
})(jQuery);

// Export the modified jQuery
export default $;