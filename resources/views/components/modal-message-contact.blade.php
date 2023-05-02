<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{route('send_mail')}}">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label class="form-label fs-5">Full Name</label>
                    <input class="form-control" name="mail_fullName" type="text"></input>
                </div>
                <div class="mb-3">
                    <label class="form-label fs-5">Your email address</label>
                    <input class="form-control" name="mail_from_address" type="email"></input>
                </div>
                <div class="mb-3">
                    <label class="form-label fs-5">Subject</label>
                    <input class="form-control" name="mail_subtitle" type="text"></input>
                </div>
                <div class="mb-3">
                    <label class="form-label fs-5">Message</label>
                    <textarea class="form-control" name="mail_body" id="" cols="30" rows="6" type="text"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn button-b me-2" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn button-28">Send message</button>
            </div>
        </form>
    </div>
</div>