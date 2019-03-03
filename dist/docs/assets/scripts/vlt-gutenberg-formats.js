( function( wp ) {
	var addCodeButton = function( props ) {
		return wp.element.createElement(
			wp.editor.RichTextToolbarButton, {
				icon: 'editor-code',
				title: 'Code',
				onClick: function() {
					props.onChange( wp.richText.toggleFormat(
						props.value,
						{ type: 'docs-custom-format/code-format' }
					) );
				},
				isActive: props.isActive,
			}
		);
	}
	wp.richText.registerFormatType(
		'docs-custom-format/code-format', {
			title: 'Code Format',
			tagName: 'span',
			className: 'code',
			edit: addCodeButton,
		}
	);
} )( window.wp );