<div class="modal fade" id="reportTopic" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelReport">Report Topic</h5>
                <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id="downvote">close</span></button>
            </div>
            <form class="reportForm">
                <div class="modal-body">
                    <p class="game-quote mt-3">“Don’t make a girl a promise if you know you can’t keep it.” </p>
                    <p class="game-quote-origin">– Halo 3 </p> <!--Rotating Game Quotes-->
                    <div class="form-check" >
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="topicRadios1" value="Inapropriate topic name" >
                            <label class="form-check-label" for="topicRadios1">
                                Inapropriate topic name
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="topicRadios2" value="Not gaming related" >
                            <label class="form-check-label" for="topicRadios2">
                                Not gaming related
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="topicRadios3" value="Typo in name" >
                            <label class="form-check-label" for="topicRadios3">
                                Typo in name
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="topicRadios4" value="Other issues" >
                            <label class="form-check-label" for="topicRadios4">
                                Other issues
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="topicReport">
                    <button type="button" class="btn btn-secondary cancel-button" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger report-submit" data-bs-dismiss="modal">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
