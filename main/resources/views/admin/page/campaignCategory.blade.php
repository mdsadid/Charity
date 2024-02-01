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
                                            <img src="{{ getImage(getFilePath('campaignCategory') . '/' . $category->image, getFileSize('campaignCategory')) }}" alt="image" class="rounded">
                                        </div>
                                    </td>
                                    <td>{{ __($category->name) }}</td>
                                    <td>
                                        @php echo $category->statusBadge @endphp
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-label-primary editBtn" data-id="{{ $category->id }}" data-image="{{ getImage(getFilePath('campaignCategory') . '/' . $category->image, getFileSize('campaignCategory')) }}" data-name="{{ $category->name }}">
                                            <span class="tf-icons las la-pen me-1"></span> @lang('Edit')
                                        </button>

                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-label-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('KYC Action')</button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" class="dropdown-item detailBtn" data-bs-toggle      = "offcanvas" data-bs-target      = "#offcanvasBoth" aria-controls       = "offcanvasBoth" data-kyc_data = "{{ json_encode($user->kyc_data) }}">
                                                        <i class="las la-info-circle fs-6 link-info"></i> @lang('KYC Details')
                                                    </button>
                                                </li>

                                                <li>
                                                    <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you confirm the approval of these documents?')" data-action="{{ route('admin.user.kyc.approve', $user->id) }}">
                                                        <i class="las la-check-circle fs-6 link-success"></i> @lang('Approve')
                                                    </button>
                                                </li>

                                                <li>
                                                    <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you confirm the cancelation of these documents?')" data-action="{{ route('admin.user.kyc.cancel', $user->id) }}">
                                                        <i class="lar la-times-circle fs-6 link-warning"></i> @lang('Cancel')
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
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
                <form action="{{ route('admin.campaign.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label required">@lang('Image')</label>
                            <div class="col-sm-9">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ getImage('/', getFileSize('campaignCategory')) }})">
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
                                                @lang('Supported files'): <mark>@lang('jpeg'), @lang('jpg'), @lang('png').</mark> @lang('Image size') <mark>{{ getFileSize('campaignCategory') }}@lang('px').</mark>
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
                <form action="{{ route('admin.campaign.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">@lang('Image')</label>
                            <div class="col-sm-9">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview imageModalUpdate">
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
                                                @lang('Supported files'): <mark>@lang('jpeg'), @lang('jpg'), @lang('png').</mark> @lang('Image size') <mark>{{ getFileSize('campaignCategory') }}@lang('px').</mark>
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
@endsection

@push('breadcrumb')
    <button type="button" class="btn btn-label-primary addBtn">
        <span class="tf-icons las la-plus-circle me-1"></span> @lang('Add New')
    </button>
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('.addBtn').on('click', function() {
                $('#addModal').modal('show')
            })

            $('.editBtn').on('click', function() {
                let modal = $('#editModal')
                let id = $(this).data('id')
                let image = $(this).data('image')
                let name = $(this).data('name')

                $('.imageModalUpdate').css("background-image", `url(${image})`)
                modal.find('[name=name]').val(name)
                modal.find('[name=id]').val(id)
                modal.modal('show')
            })
        })(jQuery)
    </script>
@endpush
