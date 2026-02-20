<!--begin::Card-->
<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header py-3">
        <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
        </div>
        <div class="card-toolbar">
            <button type="submit" form="change_password_form" class="btn btn-success mr-2">Save Changes</button>
            <button type="reset" form="change_password_form" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form id="change_password_form" class="form" method="POST" action="{{ route('profile.update.password') }}">
        @csrf
        @method('PUT')

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

            @if($errors->any())
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

            <!--begin::Alert-->
            <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <div class="alert-text font-weight-bold">Configure user passwords to expire periodically. Users will need warning that their passwords are going to expire,
                <br />or they might inadvertently get locked out of the system!</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="ki ki-close"></i>
                        </span>
                    </button>
                </div>
            </div>
            <!--end::Alert-->
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                <div class="col-lg-9 col-xl-6">
                    <input type="password" name="current_password" class="form-control form-control-lg form-control-solid mb-2" placeholder="Current password" required />
                    <a href="{{ route('password.request') }}" class="text-sm font-weight-bold">Forgot Password?</a>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                <div class="col-lg-9 col-xl-6">
                    <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="New password" required />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                <div class="col-lg-9 col-xl-6">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid" placeholder="Verify password" required />
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->