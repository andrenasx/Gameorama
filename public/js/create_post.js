$('#select2-topics').select2({
    placeholder: 'Select at least 1 topic, max 10',
    maximumSelectionLength: 10,
    tags: true,
    allowClear: true,
    width: '100%'
});

//CKEDITOR.replace( 'editor-body', { customConfig: '/js/ckeditor4config.js' });

/*ClassicEditor
    .create( document.querySelector( '#editor-body' ), {
        placeholder: 'Type here your text',
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', 'link', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h4', title: 'Heading 1', class: 'ck-heading_heading2' },
                { model: 'heading2', view: 'h5', title: 'Heading 2', class: 'ck-heading_heading3' }
            ]
        }
    })
    .then( editor => {
        console.log( Array.from( editor.ui.componentFactory.names() ) );
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );*/
