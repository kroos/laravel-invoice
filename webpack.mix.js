let mix = require('laravel-mix');

mix.webpackConfig({
	stats: {
		children: true
	},
});

// Compile JavaScript
mix.js('resources/js/app.js', 'public/js/app.js');

// For app.css (regular CSS)
mix.postCss('resources/css/app.css', 'public/css/app.css', [
	require('postcss-custom-properties')  // Example if using other postcss plugins
]);

// For tailwind.css, ensure it is being processed by PostCSS with the right plugin
mix.postCss('resources/css/tailwind.css', 'public/css/tailwind.css', [
	require('tailwindcss'),
	require('autoprefixer'),
]);

// Enable source maps for debugging
mix.sourceMaps();

// Versioning for cache busting in production
if (mix.inProduction()) {
	mix.version();
}

