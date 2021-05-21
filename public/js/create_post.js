$('#select2-topics').select2({
    placeholder: 'Select at least 1 topic, max 10',
    maximumSelectionLength: 10,
    tags: true,
    allowClear: true,
    width: '100%'
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
