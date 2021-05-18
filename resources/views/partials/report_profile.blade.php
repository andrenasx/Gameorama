<div class="modal fade" id="reportProfile"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelReport">Report Profile</h5>
                <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id="downvote">close</span></button>
            </div>
            <form class="reportForm">
                <div class="modal-body">
                    <p class="game-quote mt-3">“FINISH HIM!” </p>
                    <p class="game-quote-origin">– Mortal Kombat </p> <!--Rotating Game Quotes-->
                    <div class="form-check" >
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="profileRadios1" value="Inapropriate username" >
                            <label class="form-check-label" for="profileRadios1">
                                Inapropriate username
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="profileRadios2" value="Impersonating someone" >
                            <label class="form-check-label" for="profileRadios2">
                                Impersonating someone   
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="profileRadios3" value="Posts are offensive" >
                            <label class="form-check-label" for="profileRadios3">
                                Posts are offensive
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="option" id="profileRadios4" value="Other issues" >
                            <label class="form-check-label" for="profileRadios4">
                                Other issues
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer " id="profileReport">
                    <button type="button" class="btn btn-secondary cancel-button" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary delete-button report-submit" data-bs-dismiss="modal">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
