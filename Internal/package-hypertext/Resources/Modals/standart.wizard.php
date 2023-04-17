<div id="{{ $modalId }}" class="modal fade" role="dialog">
    <div class="modal-dialog {{ZN\Base::prefix($modalSize, 'modal-')}}">
        <div class="modal-content">
            @if( ! empty($modalHeader) )
            <div class="modal-header">
            @if( ! empty($modalDismissButton) ) 
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            @endif
                <h4 class="modal-title">{{ $modalHeader }}</h4>
            </div>
            @endif

            @if( ! empty($modalBody) )
            <div class="modal-body">
                <p>{{ $modalBody }}</p>
            </div>
            @endif

            @if( ! empty($modalFooter) )
            <div class="modal-footer">
                {{ $modalFooter }}
            </div>
            @endif
        </div>
    </div>
</div>