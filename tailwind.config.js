import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
				'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
				'./resources/**/*.blade.php',
				'./resources/**/*.js',
	],
	corePlugins: {
		preflight: false, // 🚫 disable Tailwind reset (Bootstrap already does this)
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
