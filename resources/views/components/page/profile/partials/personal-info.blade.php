@props(['user'])

<!--begin::Card-->
<div class="card card-custom card-stretch card-dark-theme border-0">
    <!--begin::Header-->
    <div class="card-header py-3 border-bottom-0">
        <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-white-85">Personal Information</h3>
            <span class="text-muted-slate font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
        </div>
        <div class="card-toolbar">
            <button type="submit" form="personal_info_form" class="btn btn-security-primary mr-2">Save Changes</button>
            <button type="reset" form="personal_info_form" class="btn btn-dark-outline text-muted-slate border-secondary">Cancel</button>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form id="personal_info_form" class="form" method="POST" action="{{ route('profile.update.personal') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!--begin::Body-->
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-custom alert-light-success fade show mb-10" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                    <div class="alert-text">{{ session('success') }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">
                <label class="col-xl-3"></label>
                <div class="col-lg-9 col-xl-6">
                    <h5 class="font-weight-bold mb-6 text-white-85">Customer Info</h5>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">Avatar</label>
                <div class="col-lg-9 col-xl-6">

                    @php
                        $defaultAvatar = asset('media/users/blank.png');
                        $avatarPath = $user->avatar ? asset('storage/' . $user->avatar) : $defaultAvatar;
                    @endphp

                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ $defaultAvatar }}); border: 2px dashed #2D3748; border-radius: 6px;">
                        <div class="image-input-wrapper" style="background-image: url({{ $avatarPath }}); border-radius: 6px;"></div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" style="background-color: #1B2538; border: 1px solid #2D3748;">
                            <i class="fa fa-pen icon-sm text-white-85"></i>
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar" style="background-color: #1B2538; border: 1px solid #2D3748;">
                            <i class="ki ki-bold-close icon-xs text-muted-slate"></i>
                        </span>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar" style="background-color: #1B2538; border: 1px solid #2D3748;">
                            <i class="ki ki-bold-close icon-xs text-muted-slate"></i>
                        </span>
                    </div>
                    <span class="form-text text-muted-slate mt-2">Allowed file types: png, jpg, jpeg.</span>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">First Name</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid input-dark-custom" type="text" value="{{ old('first_name', $user->first_name) }}" name="first_name" />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">Last Name</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid input-dark-custom" type="text" value="{{ old('last_name', $user->last_name) }}" name="last_name" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">Department Name</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid input-dark-custom" type="text" value="{{ $user->department->name }}" readonly />
                </div>
            </div>

            <div class="separator separator-dashed my-10" style="border-bottom-color: #2D3748;"></div>

            <div class="row">
                <label class="col-xl-3"></label>
                <div class="col-lg-9 col-xl-6">
                    <h5 class="font-weight-bold mt-10 mb-6 text-white-85">Contact Info</h5>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">Contact Phone</label>
                <div class="col-lg-9 col-xl-6">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #1B2538; border: 1px solid #2D3748; border-right: none; color: #94A3B8;">
                                <i class="la la-phone text-muted-slate"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-lg form-control-solid input-dark-custom" style="border-left: none;" value="{{ old('phone', $user->phone) }}" name="phone" placeholder="Phone" />
                    </div>
                    <span class="form-text text-muted-slate mt-2">We'll never share your contact information with anyone else.</span>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-xl-3 col-lg-3 col-form-label text-right text-white-85">Email Address</label>
                <div class="col-lg-9 col-xl-6">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #1B2538; border: 1px solid #2D3748; border-right: none; color: #94A3B8;">
                                <i class="la la-at text-muted-slate"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-lg form-control-solid input-dark-custom" style="border-left: none; opacity: 0.7; cursor: not-allowed;" value="{{ $user->email }}" placeholder="Email" readonly />
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
    </form>
    <!--end::Form-->
</div>