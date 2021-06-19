module.exports = {
	plugins: [
		require('postcss-partial-import')(),
		require('tailwindcss'),
		require('cssnano')({
			preset: [
				'advanced',
				{
					zindex: false,
				},
			],
		}),
		require('postcss-preset-env')({ stage: 1 }),
	]
}