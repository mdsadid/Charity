@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('Image')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="avatar me-2">
                                            <img src="{{ getImage(getFilePath('category') . '/' . $category->image, getFileSize('category')) }}" alt="image" class="rounded">
                                        </div>
                                    </td>
                                    <td>{{ __($category->name) }}</td>
                                    <td>
                                        @php echo $category->statusBadge @endphp
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-label-primary editBtn" data-resource="{{ $category }}" data-image="{{ getImage(getFilePath('category') . '/' . $category->image, getFileSize('category')) }}" data-action="{{ route('admin.categories.store', $category->id) }}">
                                            <span class="tf-icons las la-pen me-1"></span> @lang('Edit')
                                        </button>

                                        @if ($category->status)
                                            <button type="button" class="btn btn-sm btn-label-warning decisionBtn" data-question="@lang('Are you sure to inactive this category?')" data-action="{{ route('admin.categories.status', $category->id) }}">
                                                <span class="tf-icons las la-ban me-1"></span> @lang('Make Inactive')
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-label-success decisionBtn" data-question="@lang('Are you sure to active this category?')" data-action="{{ route('admin.categories.status', $category->id) }}">
                                                <span class="tf-icons las la-check-circle me-1"></span> @lang('Make Active')
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($categories->hasPages())
                    <div class="card-footer pagination justify-content-center">
                        {{ paginateLinks($categories) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">@lang('Add New Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label required">@lang('Image')</label>
                            <div class="col-sm-9">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ getImage('/', getFileSize('category')) }})">
                                                <button type="button" class="remove-image">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="addImage" accept=".png, .jpg, .jpeg" required>
                                            <label for="addImage" class="btn btn-primary upload-btn" title="Image">
                                                <i class="las la-upload"></i>
                                            </label>
                                            <p class="pt-2">
                                                @lang('Supported files'): <mark>@lang('jpeg'), @lang('jpg'), @lang('png').</mark> @lang('Image size') <mark>{{ getFileSize('category') }}@lang('px').</mark>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label required">@lang('Name')</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('Add')</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">@lang('Update Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">@lang('Image')</label>
                            <div class="col-sm-9">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview">
                                                <button type="button" class="remove-image">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="fileUploader" accept=".png, .jpg, .jpeg">
                                            <label for="fileUploader" class="btn btn-primary upload-btn" title="Image">
                                                <i class="las la-upload"></i>
                                            </label>
                                            <p class="pt-2">
                                                @lang('Supported files'): <mark>@lang('jpeg'), @lang('jpg'), @lang('png').</mark> @lang('Image size') <mark>{{ getFileSize('category') }}@lang('px').</mark>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label required">@lang('Name')</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-decisionModal />
@endsection

@push('breadcrumb')
    <x-searchForm placeholder="Name" />

    <button type="button" class="btn btn-label-primary addBtn">
        <span class="tf-icons las la-plus-circle me-1"></span> @lang('Add New')
    </button>
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict"

            let addModal = $('#addModal')
            let editModal = $('#editModal')

            $('.addBtn').on('click', function() {
                addModal.modal('show')
            })

            $('.editBtn').on('click', function() {
                let resource = $(this).data('resource')
                let image = $(this).data('image')
                let formAction = $(this).data('action')

                editModal.find('.profilePicPreview').css("background-image", `url(${image})`)
                editModal.find('[name=name]').val(resource.name)
                editModal.find('form').attr('action', formAction)
                editModal.modal('show')
            })
        })(jQuery)
    </script>
@endpush
