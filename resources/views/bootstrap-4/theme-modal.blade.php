<div class="modal modal-box {{ ($open ?? false) ? '' : 'd-none' }}" data-modal="{{ $name }}" id="{{ $name }}" data-modal-backdrop>
    <div class="modal-dialog animated bounceInRight">
        <div class="modal-content">
            <div class="modal-wrapper @isset($large) modal-wrapper-lg @endisset">
                <button type="button" class="close modal-close" data-dismiss="modal"></button>
                <div class="modal-body">
                    @isset($title)
                    <header class="modal-header">
                        <span class="modal-title">{{ $title }}</span>
                    </header>
                    @endisset
                    <div class="modal-content scrollbar">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
