@extends($activeTheme . 'layouts.frontend')

@section('front_end')
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
                            <form action="{{ route('user.campaign.file.upload') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                @csrf
                            </form>
                            <div class="col-12 mt-1 mb-4">
                                <span><em><small>*@lang('Supported files'): <span class="text--base fw-bold">@lang('jpeg'), @lang('jpg'), @lang('png')</span>. @lang('Image size'): <span class="text--base fw-bold">{{ getFileSize('campaign') }}@lang('px')</span>.</small></em></span>
                            </div>
                            {{-- dropzone end --}}

                            <form action="{{ route('user.campaign.store') }}" method="POST" class="row g-4" enctype="multipart/form-data">
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
                                        <input type="text" class="form--control" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Category')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select class="form--control form-select" name="category_id" required>
                                            <option value="" selected>@lang('Select Category')</option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                    {{ __(@$category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Goal Amount')</label>
                                    <div class="input--group">
                                        <span class="input-group-text">{{ @$setting->cur_sym }}</span>
                                        <input type="number" step="any" class="form--control" name="goal_amount" value="{{ old('goal_amount') }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('Start Date')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                        <input type="text" class="form--control datepicker" name="start_date" value="{{ old('start_date') }}" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">@lang('End Date')</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                        <input type="text" class="form--control datepicker" name="end_date" value="{{ old('end_date') }}" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">@lang('Description')</label>
                                    <textarea class="form--control ck-editor" name="description" rows="10">
                                        @php echo old('description') @endphp
                                    </textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form--label">@lang('Document')</label>
                                    <div class="d-flex mb-1">
                                        <input type="file" class="form--control" name="document" accept=".pdf">
                                    </div>
                                    <span><em><small>@lang('Supported file'): <span class="text--base fw-bold">.@lang('pdf')</span>.</small></em></span>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn--base w-100">@lang('Create Campaign')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/dropzone.min.css') }}">
@endpush

@push('page-script-lib')
    <script src="{{ asset($activeThemeTrue . 'js/dropzone.min.js') }}"></script>
    <script src="{{ asset($activeThemeTrue . 'js/ckeditor.js') }}"></script>
@endpush

@push('page-script')
    <script type="text/javascript">
        (function($) {
            "use strict"

            new Dropzone('.dropzone', {
                thumbnailWidth: 200,
                acceptedFiles: '.jpg, .jpeg, .png',
                addRemoveLinks: true,
                success: function(file, response) {
                    file.unique_name = response.image

                    showToasts('success', response.message)
                },
                error: function(file, response) {
                    showToasts('error', response.error.file[0])
                },
                removedfile: function(file) {
                    let url = "{{ route('user.campaign.file.remove') }}"
                    let data = {
                        file: file.unique_name,
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

            $('.datepicker').on('input keyup keydown keypress', function() {
                return false
            })

            $('.datepicker').on('pick.datepicker', function(e) {
                // Prevent to pick the older date
                if (e.date < new Date()) {
                    e.preventDefault()
                    showToasts('error', 'You can\'t pick older date')
                }
            })
        })(jQuery)
    </script>
@endpush
