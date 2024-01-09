( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var InnerBlocks = blockEditor.InnerBlocks;

    blocks.registerBlockType( 'container-div/block', {
        title: 'Contenedor Div',
        icon: 'screenoptions', // Puedes cambiar el icono según tus preferencias.
        category: 'layout',
        edit: function() {
            return el( 'div', { className: 'jlmr-container-simple-div-block' }, el( InnerBlocks ) );
        },
        save: function() {
            return el( 'div', { className: 'jlmr-container-simple-div-block' }, el( InnerBlocks.Content ) );
        },
    } );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );
