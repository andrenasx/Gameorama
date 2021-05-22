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
        "save contextmenu directionality template paste"
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

/*Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#myDropzone", {
    url: '/post/create',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 10,
    maxFiles: 10,
    maxFilesize: 50,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        console.log('here')
        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            console.log(formData)
        });
    }
});*/

/* html
<section id="images">
    <div id="myDropzone" class="dz-default dz-message myDropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </div>
    @foreach($errors->get('images') as $error)
        <li class="error">{{$error}}</li>
    @endforeach
</section>
*/
