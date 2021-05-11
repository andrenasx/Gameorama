
<div class="modal fade" id="reportPost"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelReport">Report Post</h5>
                <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id="downvote">close</span></button>
            </div>
            <form id="reportForm">
                <div class="modal-body" >
                    <p class="game-quote mt-3">“The cake is a lie”</p>
                    <p class="game-quote-origin">– Portal </p> <!--Rotating Game Quotes-->
                    <form class="form-check" >
                        <div>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"  value="This is spam" >
                            <label class="form-check-label" for="exampleRadios1">
                                This is spam
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"  value="This is misinformation" >
                            <label class="form-check-label" for="exampleRadios2">
                                This is misinformation
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"  value="This is abusive or harassing" >
                            <label class="form-check-label" for="exampleRadios3">
                                This is abusive or harassing
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4"  value="Other issues" >
                            <label class="form-check-label" for="exampleRadios4">
                                Other issues
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="postReport">
                    <button type="button" class="btn btn-secondary cancel-button" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary delete-button" data-bs-dismiss="modal">Report</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
   