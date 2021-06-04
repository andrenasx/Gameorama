$('#select2-topics').select2({
    placeholder: 'Select at least 1 topic, max 10',
    maximumSelectionLength: 10,
    tags: true,
    allowClear: true,
    width: '100%'
});

tinymce.init({
    /* replace textarea having class .tinymce with tinymce editor */
    selector: "#editor-body",

    /* theme of the editor */

    /* width and height of the editor */
    width: "100%",
    min_height: 300,
    max_height: 300,
    //content_css: "../css/main.css",

    /* display statusbar */
    menubar: false,
    branding: false,
    statubar: true,

    /* plugin */
    plugins: [
        "advlist autolink link lists charmap preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen nonbreaking",
        "save directionality template paste"
    ],

    /* toolbar */
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | preview ",

    /* style */
    style_formats: [
        {title: "Headers", items: [
                {title: "Header 1", format: "h4"},
                {title: "Header 2", format: "h5"}
            ]},
        {title: "Inline", items: [
                {title: "Bold", icon: "bold", format: "bold"},
                {title: "Italic", icon: "italic", format: "italic"},
                {title: "Underline", icon: "underline", format: "underline"},
                {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                {title: "Superscript", icon: "superscript", format: "superscript"},
                {title: "Subscript", icon: "subscript", format: "subscript"},
                {title: "Code", icon: "code", format: "code"}
            ]},
        {title: "Blocks", items: [
                {title: "Paragraph", format: "p"},
                {title: "Blockquote", format: "blockquote"},
                {title: "Div", format: "div"},
                {title: "Pre", format: "pre"}
            ]},
    ],

    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl, {trigger: 'focus'})
})
