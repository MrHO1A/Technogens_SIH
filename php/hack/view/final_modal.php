<script>
    function sub() {
        alert("Form Submitted Successfully... Thank You For Choosing Us!");
    }
</script>


<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="Consent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Submitting form will allow us to get access to your selected documents. Which will be used for further verification.
                </p>
            </div>
            <div class="modal-footer">
                <a href="./class/del"><button type="button" class="btn btn-secondary">Deny</button></a>
                <button type="button" onclick="sub()" class="btn btn-primary">Accept</button>
            </div>
        </div>
    </div>
</div>