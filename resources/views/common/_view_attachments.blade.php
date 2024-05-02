@if(!empty($attachments))
    @foreach( $attachments as $attachment)
        <div id="attachment_{{ $attachment->id }}">
            <div class="col-md-12 input-group control-group">
                <div class="col-md-9" style="border: 1px solid #ced4da; margin-bottom: 10px">
                    <p>{{ $attachment->file }}&nbsp;</p>
                </div>
                <div class="col-md-3 input-group-btn">
                    <a href="{{ route($route,['file'=>$attachment->file]) }}" target="_blank" class="btn btn-success"
                       type="button"><i
                                class="fa fa-eye"></i>
                    </a>
                    <button class="btn btn-danger delete-file"
                            onclick="deleteAttachment('{{ $attachment->id }}','{{ $attachment->attachmentable_type }}')"
                            type="button"><i
                                class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
@endif
