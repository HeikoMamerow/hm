const plugin = require('tailwindcss/plugin')

module.exports = {
	corePlugins: {
		container: false, // Disable the origin container. We use our own.
	},
	darkMode: 'media', // false or 'media' or 'class'
	plugins: [
		require('tailwindcss-important'),
		require('@tailwindcss/typography'),
		function ({
			addComponents
		}) {
			addComponents({
				'.container': {
					marginInline: "auto",
					paddingInline: '0.75rem',
					maxWidth: '640px',
					'@screen sm': {
						paddingInline: '2rem',
					},
				}
			})

		},
		plugin(function ({
			addVariant
		}) {
			addVariant('important', ({
				container
			}) => {
				container.walkRules(rule => {
					rule.selector = `.\\!${rule.selector.slice(1)}`
					rule.walkDecls(decl => {
						decl.important = true
					})
				})
			})
		}),
	],
	purge: {
		//enabled: true,
		//content: ['./build/**/*.php']
	},
	theme: {
		extend: {
			colors: {
				'hm-red': '#b25e80',
			},
			transitionProperty: {
				'width': 'width',
			},
			zIndex: {
				'-1': '-1',
			}
		}
	},
	variants: {
		textDecoration: ['important'],
		// margin: ['important'],
	}
}