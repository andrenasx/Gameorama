<div class="modal fade" id="reportTopic" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelReport">Report Topic</h5>
                <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id="downvote">close</span></button>
            </div>
            <form class="reportForm">
                <div class="modal-body">
                    <p class="game-quote mt-3">“FINISH HIM!” </p>
                    <p class="game-quote-origin">– Mortal Kombat </p> <!--Rotating Game Quotes-->
                    <div class="form-check" >
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="exampleRadios1" value="Inapropriate topic name" >
                            <label class="form-check-label" for="exampleRadios1">
                                Inapropriate topic name
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="exampleRadios2" value="Not gaming related" >
                            <label class="form-check-label" for="exampleRadios2">
                                Not gaming related  
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="exampleRadios3" value="Typo in name" >
                            <label class="form-check-label" for="exampleRadios3">
                                Typo in name
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="exampleRadios4" value="Other issues" >
                            <label class="form-check-label" for="exampleRadios4">
                                Other issues
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="topicReport">
                    <button type="button" class="btn btn-secondary cancel-button" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary delete-button report-submit" data-bs-dismiss="modal">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
