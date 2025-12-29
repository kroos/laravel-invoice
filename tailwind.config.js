import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
	],

	// prefix: 'tw',

	corePlugins: {
		preflight: false, // Disable Tailwind's reset styles to avoid conflicts
	},

	theme: {
		extend: {
			fontFamily: {
				sans: ['Cactus Classical Serif', ...defaultTheme.fontFamily.sans],
			},
		},
	},

	plugins: [forms],
};
