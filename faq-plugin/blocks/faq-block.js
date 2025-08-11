const { registerBlockType } = wp.blocks;

registerBlockType('faq-plugin/faq-block', {
    title: 'FAQ Block',
    icon: 'editor-help',
    category: 'widgets',
    edit: () => wp.element.createElement("p", {}, "FAQ block will render on front-end."),
    save: () => null,
});
