@props(['ticket'])

<div class="card-spacer mb-3" id="kt_inbox_reply">
    <div class="card card-custom shadow-sm">
        <div class="card-body p-0">
            <form id="kt_inbox_reply_form" action="{{ route('tickets.reply.store', $ticket) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="message" id="hidden_message_input">
                
                <div class="d-block p-5">
                    <div class="form-group">
                         <div id="ticket_reply_editor" class="border-0" style="height: 200px"></div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-5 border-top pt-5">
                        <div class="d-flex align-items-center">
                            <label class="btn btn-clean btn-icon btn-sm mr-2 mb-0" data-toggle="tooltip" title="Attach file">
                                <i class="flaticon2-clip-symbol"></i>
                                <input type="file" id="attachment_input" name="attachment" style="position: absolute; opacity: 0; width: 0; height: 0;">
                            </label>
                            <span id="file-name-display" class="text-muted font-size-sm">No file chosen</span>
                        </div>
                    </div>

                    <div id="attachment-preview-container" class="mt-3 p-3 bg-light rounded d-none">
                        <div class="d-flex align-items-center">
                            <img id="attachment-preview-img" src="" style="max-height: 80px; max-width: 80px; border-radius: 4px; display: none;" class="mr-3 border">
                            
                            <div id="attachment-preview-icon" class="mr-3" style="display: none;">
                                <span class="svg-icon svg-icon-3x svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" opacity="0.3"/></g></svg>
                                </span>
                            </div>

                            <div class="d-flex flex-column">
                                <span id="preview-filename" class="font-weight-bold text-dark-75"></span>
                                <a href="javascript:;" id="remove-attachment" class="text-danger font-size-sm font-weight-bold">Remove</a>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 bg-light-light rounded-bottom">
                    <div class="d-flex align-items-center mr-3">
                        <button type="submit" class="btn btn-primary font-weight-bold px-6">Send Reply</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // 1. Initialize Quill (with the custom ID)
        var quill = new Quill('#ticket_reply_editor', {
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link']
                ]
            },
            placeholder: 'Type your reply here...',
            theme: 'snow' 
        });

        // 2. Handle File Attachment Preview
        $('#attachment_input').on('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;

            // Reset UI
            $('#attachment-preview-container').removeClass('d-none');
            $('#file-name-display').text(file.name);
            $('#preview-filename').text(file.name);
            $('#attachment-preview-img').hide();
            $('#attachment-preview-icon').hide();

            // Check if image
            if (file.type && file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#attachment-preview-img').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            } else {
                // Show generic icon for non-images (PDF, Doc, etc)
                $('#attachment-preview-icon').show();
            }
        });

        // 3. Handle Remove Attachment
        $('#remove-attachment').on('click', function() {
            $('#attachment_input').val(''); // Clear input
            $('#attachment-preview-container').addClass('d-none'); // Hide preview
            $('#file-name-display').text('No file chosen');
        });
        
        // 4. Submit Form
        var form = document.getElementById('kt_inbox_reply_form');
        form.onsubmit = function() {
            var htmlContent = quill.root.innerHTML;
            document.getElementById('hidden_message_input').value = htmlContent;
        };
    });
</script>
@endpush