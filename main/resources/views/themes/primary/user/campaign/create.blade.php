@extends($activeTheme . 'layouts.frontend')

@section('page_content')
    <div class="create-campaign py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="custom--card">
                        <div class="card-body">
                            {{-- dropzone start --}}
                            <div class="col-12">
                                <label class="form--label required">@lang('Gallery')</label>
                            </div>
                            <form action="{{ route('user.file.upload') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                @csrf
                            </form>
                            <div class="col-12 mt-1 mb-4">
                                <span><em><small>*@lang('Supported files'): <span class="text--base fw-bold">@lang('jpeg'), @lang('jpg'), @lang('png')</span>. @lang('Image size'): <span class="text--base fw-bold">{{ getFileSize('campaign') }}@lang('px')</span>.</small></em></span>
                            </div>
                            {{-- dropzone end --}}

                            <form action="#" method="POST" class="row g-4" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <div class="upload__img mb-2">
                                        <label for="imageUpload" class="form--label required">@lang('Image')</label>
                                        <label for="imageUpload" class="upload__img__btn"><i class="las la-camera"></i></label>
                                        <input type="file" id="imageUpload" name="image" required accept=".jpeg, .jpg, .png">
                                        <div class="upload__img-preview image-preview">+</div>
                                    </div>
                                    <span><em><small>*@lang('Supported files'): <span class="text--base fw-bold">@lang('jpeg'), @lang('jpg'), @lang('png')</span>. @lang('Image size'): <span class="text--base fw-bold">{{ getFileSize('campaign') }}@lang('px')</span>. @lang('Thumbnail size'): <span class="text--base fw-bold">{{ getThumbSize('campaign') }}@lang('px')</span>.</small></em></span>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">@lang('Name')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-h"></i></span>
                                        <input type="text" class="form--control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Category')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select class="form--control form-select" name="category_id" required>
                                            <option value="" selected>@lang('Select Category')</option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ __(@$category->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Goal Amount')</label>
                                    <div class="input--group">
                                        <span class="input-group-text">{{ @$setting->cur_sym }}</span>
                                        <input type="number" step="0.01" class="form--control" name="goal_amount" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Start Time')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-regular fa-clock"></i></span>
                                        <input type="text" class="form--control datepicker" name="start_time" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('End Time')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-regular fa-clock"></i></span>
                                        <input type="text" class="form--control datepicker" name="end_time" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">@lang('Description')</label>
                                    <textarea class="form--control ck-editor" name="description" rows="10" required></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form--label">@lang('Document')</label>
                                    <div class="d-flex mb-1">
                                        <input type="file" class="form--control" name="document" accept=".pdf" required>
                                    </div>
                                    <span><em><small>@lang('Supported file'): <span class="text--base fw-bold">.@lang('pdf')</span>.</small></em></span>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn--base w-100">@lang('Create Campaign')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style')
    <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/dropzone.min.css') }}">
@endpush

@push('page-script')
    <script src="{{ asset($activeThemeTrue . 'js/dropzone.min.js') }}"></script>

    <script type="text/javascript">
        new Dropzone('.dropzone', {
            thumbnailWidth: 200,
            acceptedFiles: '.jpg, .jpeg, .png',
            addRemoveLinks: true,
            success: function(file, response) {
                file.original_name = response.image

                showToasts('success', response.message)
            },
            error: function(file, response) {
                showToasts('error', response.error.file[0])
            },
            removedfile: function(file) {
                let url  = "{{ route('user.file.remove') }}"
                let data = {
                    file: file.original_name,
                    _token: "{{ csrf_token() }}",
                }

                $.post(url, data, function(response) {
                    if (response.status === 'success') {
                        showToasts('success', response.message)
                    } else {
                        console.error(response)
                    }
                })

                let fileRef = file.previewElement

                return fileRef != null ? fileRef.parentNode.removeChild(fileRef) : void 0
            }
        })
    </script>
@endpush
