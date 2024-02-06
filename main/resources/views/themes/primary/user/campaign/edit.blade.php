@extends($activeTheme . 'layouts.frontend')

@section('page_content')
    <div class="create-campaign py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="custom--card">
                        <div class="card-body">
                            {{-- dropzone start --}}
                            <div class="col-12 mb-2">
                                <label class="form--label required">@lang('Gallery')</label>
                                <div class="row">
                                    @foreach ($campaign->gallery as $image)
                                        <div class="col-3">
                                            <div class="image-container">
                                                @if (count($campaign->gallery) > 1)
                                                    <div class="remove-button" data-image="{{ json_encode($image) }}">
                                                        <button type="button" class="text-light">x</button>
                                                    </div>
                                                @endif

                                                <img src="{{ getImage(getFilePath('campaign') . '/' . $image, getFileSize('campaign')) }}" alt="Image" class="img-fluid">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
                                        <div class="upload__img-preview image-preview">
                                            <img src="{{ getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign')) }}" alt="">
                                        </div>
                                    </div>
                                    <span><em><small>*@lang('Supported files'): <span class="text--base fw-bold">@lang('jpeg'), @lang('jpg'), @lang('png')</span>. @lang('Image size'): <span class="text--base fw-bold">{{ getFileSize('campaign') }}@lang('px')</span>. @lang('Thumbnail size'): <span class="text--base fw-bold">{{ getThumbSize('campaign') }}@lang('px')</span>.</small></em></span>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn--base w-100">@lang('Update Campaign')</button>
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

@push('page-style')
    <style>
        .image-container {
            position: relative;
            margin: 3px 0 10px;
        }

        .remove-button {
            position: absolute;
            top: -12px;
            right: -12px;
            background-color: rgb(255, 0, 0);
            border: none;
            border-radius: 15%;
            padding: 0px 8px;
            cursor: pointer;
        }
    </style>
@endpush

@push('page-script-lib')
    <script src="{{ asset($activeThemeTrue . 'js/dropzone.min.js') }}"></script>
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
                    let url  = "{{ route('user.campaign.file.remove') }}"
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

            $('.remove-button').on('click', function () {
                let image = $(this).data('image')
                let url   = "{{ route('user.campaign.image.remove') }}"
                let data  = {
                    image,
                    _token: "{{ csrf_token() }}",
                }

                $.post(url, data, function(response) {
                    if (response.status === 'success') {
                        showToasts('success', response.message)
                    } else {
                        console.error(response)
                    }
                })
            })
        })(jQuery)
    </script>
@endpush
