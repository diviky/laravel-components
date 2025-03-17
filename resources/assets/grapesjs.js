// Import GrapeJS and plugins
import grapesjs from 'grapesjs';
import gjsPresetWebpage from 'grapesjs-preset-webpage';

// Import required CSS
import 'grapesjs/dist/css/grapes.min.css';
import './grapesjs.css';

class GrapesJSEditor {
    constructor(options) {
        this.options = Object.assign(
            {
                editorConfig: {},
                inputId: '',
                csrfToken: '',
                uploadUrl: '',
                prefix: '',
                folder: '',
            },
            options
        );

        this.editor = null;
        this.value = this.options.value || '';
        this.uploading = false;
    }

    init() {
        const containerEl = document.getElementById(this.options.containerId);
        if (!containerEl) return;

        // Initialize GrapeJS
        const editorConfig = {
            ...this.options.editorConfig,
            container: `#${this.options.containerId}`,
            plugins: [...(this.options.editorConfig.plugins || []), gjsPresetWebpage],
            assetManager: {
                ...this.options.editorConfig.assetManager,
                upload: this.options.uploadUrl,
                uploadName: 'file',
                params: {
                    _token: this.options.csrfToken,
                    folder: this.options.folder,
                },
                autoAdd: true,
            },
        };

        this.editor = grapesjs.init(editorConfig);

        // Set initial content if available
        if (this.value) {
            this.editor.setComponents(this.value);
        }

        // Update hidden input when content changes
        this.editor.on('change:changesCount', () => {
            this.updateHiddenField();
        });

        // Set up asset upload handling
        this.setupAssetManager();

        return this.editor;
    }

    setupAssetManager() {
        const assetManager = this.editor.AssetManager;

        // Handle custom upload logic if needed
        this.editor.on('asset:upload:start', () => {
            this.uploading = true;
        });

        this.editor.on('asset:upload:end', () => {
            this.uploading = false;
        });

        this.editor.on('asset:upload:error', (err) => {
            console.error('Asset upload error:', err);
            this.uploading = false;
        });
    }

    updateHiddenField() {
        const html = this.editor.getHtml();
        const css = this.editor.getCss();
        const hiddenInput = document.getElementById(this.options.inputId);

        if (hiddenInput) {
            // Store both HTML and CSS (you can decide the format)
            hiddenInput.value = html;
        }
    }

    destroy() {
        if (this.editor) {
            this.editor.destroy();
            this.editor = null;
        }
    }
}

window.GrapesJSEditor = GrapesJSEditor;
export default GrapesJSEditor;
