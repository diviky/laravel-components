<div x-data="{
    progress: 0,
    cropper: null,
    justCropped: false,
    fileChanged: false,
    imagePreview: null,
    imageCrop: null,
    originalImageUrl: null,
    cropAfterChange: {{ json_encode($cropAfterChange) }},
    file: {{ json_encode($name) }},
    init() {
        this.imagePreview = this.$refs.preview?.querySelector('img')
        this.imageCrop = this.$refs.crop?.querySelector('img')
        this.originalImageUrl = this.imagePreview?.src

        this.$watch('progress', value => {
            if (value == 100 && this.cropAfterChange && !this.justCropped) {
                this.crop()
            }
        })
    },
    get processing() {
        return this.progress > 0 && this.progress < 100
    },
    close() {
        $refs.componentCrop.hide()
        this.cropper?.destroy()
    },
    change() {
        if (this.processing) {
            return
        }

        this.$refs.file.click()
    },
    refreshImage() {
        this.progress = 1
        this.justCropped = false

        if (this.imagePreview?.src) {
            this.imagePreview.src = URL.createObjectURL(this.$refs.file.files[0])
            this.imageCrop.src = this.imagePreview.src
        }
    },
    crop() {
        $refs.componentCrop.show()
        this.cropper?.destroy()

        this.cropper = new Cropper(this.imageCrop, {{ $cropSetup() }});
    },
    revert() {
        $wire.$removeUpload('{{ $name }}', this.file.split('livewire-file:').pop(), () => {
            this.imagePreview.src = this.originalImageUrl
        })
    },
    async save() {
        $refs.componentCrop.hide();

        this.progress = 1
        this.justCropped = true

        this.imagePreview.src = this.cropper.getCroppedCanvas().toDataURL()
        this.imageCrop.src = this.imagePreview.src
        {{--
        this.cropper.getCroppedCanvas().toBlob((blob) => {
            blob.name = $refs.file.files[0].name
            @this.upload('{{ $name }}', blob,
                (uploadedFilename) => {},
                (error) => {},
                (event) => { this.progress = event.detail.progress }
            )
        }) --}}
    }
}" x-on:livewire-upload-progress="progress = $event.detail.progress;"
    {{ $attributes->whereStartsWith('class') }}>
    <div class="form-group">

        <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

        <!-- PROGRESS BAR  -->
        @if (!$hideProgress && $slot->isEmpty())
            <div class="h-1 -mt-5 mb-5">
                <progress x-cloak :class="!processing && 'hidden'" :value="progress" max="100"
                    class="progress progress-success h-1 w-56"></progress>
            </div>
        @endif

        <!-- FILE INPUT -->
        <input accept="image/*" id="{{ $id() }}" name="{{ $name }}" type="file" x-ref="file"
            @change="refreshImage()"
            {{ $attributes->whereDoesntStartWith('class')->class(['form-file form-control', 'hide' => $slot->isNotEmpty()]) }} />

        @if ($slot->isNotEmpty())
            <!-- PREVIEW AREA -->
            <div x-ref="preview" class="relative flex">
                <div wire:ignore @click="change()" :class="processing && 'opacity-50 pointer-events-none'"
                    class="cursor-pointer hover:scale-105 transition-all" data-bs-toggle="tooltip"
                    title="{{ $changeText }}">
                    {{ $slot }}
                </div>
                <!-- PROGRESS -->
                <div x-cloak :style="`--value:${progress}; --size:1.5rem; --thickness: 4px;`"
                    :class="!processing && 'hidden'"
                    class="radial-progress text-success absolute top-5 start-5 bg-neutral" role="progressbar"></div>
            </div>

            <!-- CROP MODAL -->
            <div @click.prevent="" x-ref="crop" wire:ignore>
                <x-modal id="componentCrop{{ $id() }}" x-ref="componentCrop" :title="$cropTitleText" separator
                    class="backdrop-blur-xs" persistent @keydown.window.esc.prevent="">
                    <img src="" />
                    <x-modal.footer>
                        <x-form-button :label="$cropCancelText" @click="close()" />
                        <x-form-button :label="$cropSaveText" class="btn-primary" @click="save()" ::disabled="processing" />
                    </x-modal.footer>
                </x-modal>
            </div>
        @endif

        <x-form-errors :name="$name" />

        <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    </div>
</div>
