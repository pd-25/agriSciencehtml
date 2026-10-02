@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
        .ck-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        // Uploads images dropped/pasted/inserted into the editor to the server
        class BlogContentUploadAdapter {
            constructor(loader) {
                this.loader = loader;
                this.controller = new AbortController();
            }

            upload() {
                return this.loader.file.then(file => {
                    const data = new FormData();
                    data.append('upload', file);

                    return fetch('{{ route('admin.blogs.upload-image') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: data,
                        signal: this.controller.signal,
                    })
                        .then(response => response.json().then(json => ({ ok: response.ok, json })))
                        .then(({ ok, json }) => {
                            if (!ok || !json.url) {
                                const message = json.errors?.upload?.[0] || json.message || 'Image upload failed.';
                                return Promise.reject(message);
                            }
                            return { default: json.url };
                        });
                });
            }

            abort() {
                this.controller.abort();
            }
        }

        function BlogContentUploadPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = loader => new BlogContentUploadAdapter(loader);
        }

        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [BlogContentUploadPlugin],
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'uploadImage', 'insertTable', 'mediaEmbed', '|',
                    'undo', 'redo'
                ],
                image: {
                    toolbar: [
                        'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|',
                        'toggleImageCaption', 'imageTextAlternative'
                    ]
                },
            })
            .then(editor => {
                // The underlying textarea is hidden, so enforce "required" manually
                editor.sourceElement.closest('form').addEventListener('submit', e => {
                    if (!editor.getData().trim()) {
                        e.preventDefault();
                        alert('Please enter the blog content.');
                        editor.editing.view.focus();
                    }
                });
            })
            .catch(error => console.error(error));
    </script>
@endpush
