<!DOCTYPE html>
<html lang="en">
    {{-- begin::HEAD --}}
    <head><base href="">
        <meta charset="utf-8" />
		<title>Metronic | Dashboard</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		
        @include('theme.global-theme')
		
        @include('theme.layout-theme')

		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        <style>
            body {
                overflow: hidden; /* Sumbu X dan Y mati */
                /* atau */
                overflow-y: hidden; /* Hanya mematikan scroll vertikal */
            }
        </style>
    </head>
    {{-- end::HEAD --}}
    {{-- begin::BODY --}}
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
		
        <!--begin::Header Mobile-->
        @include('components.header-mobile')
        <!--end::Header Mobile-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">

				@include('components.side-bar')

                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                    @include('components.header')
                    
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        
                        @include('components.subheader')

                        <!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
							<div class="container">
                                <!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row">
                                    <div class="col-lg-6 col-xxl-4">
                                        <!--begin::Mixed Widget 1-->
										<div class="card card-custom bg-gray-100 card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title font-weight-bolder text-white">Ticket Flow</h3>  
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon-->
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                                                    <path fill="#ffa800" d="M96 128C60.7 128 32 156.7 32 192L32 256C32 264.8 39.4 271.7 47.7 274.6C66.5 281.1 80 299 80 320C80 341 66.5 358.9 47.7 365.4C39.4 368.3 32 375.2 32 384L32 448C32 483.3 60.7 512 96 512L544 512C579.3 512 608 483.3 608 448L608 384C608 375.2 600.6 368.3 592.3 365.4C573.5 358.9 560 341 560 320C560 299 573.5 281.1 592.3 274.6C600.6 271.7 608 264.8 608 256L608 192C608 156.7 579.3 128 544 128L96 128zM448 400L448 240L192 240L192 400L448 400zM144 224C144 206.3 158.3 192 176 192L464 192C481.7 192 496 206.3 496 224L496 416C496 433.7 481.7 448 464 448L176 448C158.3 448 144 433.7 144 416L144 224z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-warning font-weight-bold font-size-h6">Open Tickets</a>
														</div>
														<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon -->
																<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3699FF">
                                                                    <path d="M551-523q5-8 7-17.5t2-19.5q0-33-23.5-56.5T480-640q-10 0-19.5 2t-17.5 7l108 108Zm203 205-60-62q12-32 19-66.5t7-69.5v-189l-240-90-146 55-62-62 208-78 320 120v244q0 51-11.5 101T754-318Zm38 262L662-186q-38 39-84.5 65.5T480-80q-139-35-229.5-159.5T160-516v-172L56-792l56-56 736 736-56 56ZM430-418Zm57-170Zm-7 424q35-11 67-31t59-47L488-360h-68l10-58-190-190v92q0 121 68 220t172 132Z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Critical Vulnerabilities</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon-->
																<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#F64E60">
                                                                    <path d="M197.37-71.87q-35.39 0-60.45-25.05-25.05-25.06-25.05-60.45v-154.26q0-35.39 25.05-60.45 25.06-25.05 60.45-25.05h565.26q35.39 0 60.45 25.05 25.05 25.06 25.05 60.45v154.26q0 35.39-25.05 60.45-25.06 25.05-60.45 25.05H197.37Zm5.5-91h554.26v-143.26H202.87v143.26Zm57.17-294.26L50.91-575.91l245.23-40.86-66.42-240.04 203.34 144.03 122.61-216.55 40.96 245.26 240.02-66.43-144.11 203.3 159.18 90.07H677.28l-109.82-62.15 58.89-83.46-98.74 27.33-17.04-100.74-49.61 88.45-83.46-58.89 27.33 98.74-100.98 17.28 122.39 73.44h-166.2Zm230.79 0ZM480-234.5Z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">SLA Breached</a>
														</div>
														<div class="col bg-light-success px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon-->
																<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1BC5BD">
                                                                    <path d="M542.8-138.5Q484.3-197 484.3-280t58.5-141.5Q601.3-480 684.3-480t141.5 58.5Q884.3-363 884.3-280t-58.5 141.5Q767.3-80 684.3-80t-141.5-58.5Zm208.5-44.11 30.4-30.63-75.48-75.48v-113.19h-43.59v130.56l88.67 88.74Zm-548.43 70.74q-37.54 0-64.27-26.73-26.73-26.73-26.73-64.27v-554.26q0-37.54 26.73-64.27 26.73-26.73 64.27-26.73h157.91q12.44-35.72 45.94-58.46 33.5-22.74 73.28-22.74 41.2 0 74.37 22.74t45.85 58.46h156.91q37.54 0 64.27 26.73 26.73 26.73 26.73 64.27v250q-19.91-14.91-42.9-25.47-22.99-10.55-48.1-17.07v-207.46H678.8v123.83H281.2v-123.83h-78.33v554.26h212.72q7.48 25.11 18.75 48.46 11.27 23.34 27.14 42.54H202.87ZM508.5-772.93q11.5-11.5 11.5-28.5t-11.5-28.5q-11.5-11.5-28.5-11.5t-28.5 11.5q-11.5 11.5-11.5 28.5t11.5 28.5q11.5 11.5 28.5 11.5t28.5-11.5Z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Pending Verification</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 1-->
                                    </div>
                                    <div class="col-lg-6 col-xxl-4">
										<!--begin::List Widget 9-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">Recent Activities</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-ver"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<div class="timeline timeline-5 mt-3">
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">08:42</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content text-dark-50">Outlines of the recent activities that happened last weekend</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">3 hr</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Content-->
														<div class="timeline-content d-flex">
															<span class="mr-4 font-weight-bolder text-dark-75">AEOL meeting with</span>
															<!--begin::Section-->
															<div class="d-flex align-items-start mt-n2">
																<!--begin::Symbol-->
																<a href="#" class="symbol symbol-35 symbol-light-success mr-2">
																	<span class="symbol-label">
																		<img src="assets/media/svg/avatars/004-boy-1.svg" class="h-75 align-self-end" alt="" />
																	</span>
																</a>
																<!--end::Symbol-->
																<!--begin::Symbol-->
																<a href="#" class="symbol symbol-35 symbol-light-success">
																	<span class="symbol-label">
																		<img src="assets/media/svg/avatars/002-girl.svg" class="h-75 align-self-end" alt="" />
																	</span>
																</a>
																<!--end::Symbol-->
															</div>
															<!--end::Section-->
														</div>
														<!--end::Content-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">14:37</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-info icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder text-dark-75">Submit initial budget -
														<a href="#" class="text-primary">USD 700</a>.</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">16:50</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content text-dark-50">Stakeholder meeting scheduling.</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">17:30</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content text-dark-50">Project scoping &amp; estimations with stakeholders.</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">21:03</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder text-dark-75">New order placed
														<a href="#" class="text-primary">#XF-2356</a>.</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin: Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">21:07</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content text-dark-50">Company BBQ to celebrate the last quater achievements and goals.</div>
														<!--end::Text-->
													</div>
													<!--end: Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">20:30</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-info icon-xxl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content text-dark-50">Marketing campaign planning with customer.</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
												</div>
												<!--end: Items-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end: Card-->
										<!--end: List Widget 9-->
									</div>
                                    <div class="col-lg-6 col-xxl-4">
										<!--begin::Stats Widget 11-->
										<div class="card card-custom card-stretch card-stretch-half gutter-b">
											<!--begin::Body-->
											<div class="card-body p-0">
												<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-success mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-success">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                                                    <path fill="#1bc5bd" d="M96 128C60.7 128 32 156.7 32 192L32 256C32 264.8 39.4 271.7 47.7 274.6C66.5 281.1 80 299 80 320C80 341 66.5 358.9 47.7 365.4C39.4 368.3 32 375.2 32 384L32 448C32 483.3 60.7 512 96 512L544 512C579.3 512 608 483.3 608 448L608 384C608 375.2 600.6 368.3 592.3 365.4C573.5 358.9 560 341 560 320C560 299 573.5 281.1 592.3 274.6C600.6 271.7 608 264.8 608 256L608 192C608 156.7 579.3 128 544 128L96 128zM448 400L448 240L192 240L192 400L448 400zM144 224C144 206.3 158.3 192 176 192L464 192C481.7 192 496 206.3 496 224L496 416C496 433.7 481.7 448 464 448L176 448C158.3 448 144 433.7 144 416L144 224z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</span>
													<div class="d-flex flex-column text-right">
														<span class="text-dark-75 font-weight-bolder font-size-h3">750 Open Ticket</span>
														<span class="text-muted font-weight-bold mt-2">Ticket Status</span>
													</div>
												</div>
												<div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px"></div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 11-->
										<!--begin::Stats Widget 12-->
										<div class="card card-custom card-stretch card-stretch-half gutter-b">
											<!--begin::Body-->
											<div class="card-body p-0">
												<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-primary mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-primary">
																<!--begin::Svg Icon-->
																<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3699FF">
                                                                    <path d="M551-523q5-8 7-17.5t2-19.5q0-33-23.5-56.5T480-640q-10 0-19.5 2t-17.5 7l108 108Zm203 205-60-62q12-32 19-66.5t7-69.5v-189l-240-90-146 55-62-62 208-78 320 120v244q0 51-11.5 101T754-318Zm38 262L662-186q-38 39-84.5 65.5T480-80q-139-35-229.5-159.5T160-516v-172L56-792l56-56 736 736-56 56ZM430-418Zm57-170Zm-7 424q35-11 67-31t59-47L488-360h-68l10-58-190-190v92q0 121 68 220t172 132Z"/>
                                                                </svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</span>
													<div class="d-flex flex-column text-right">
														<span class="text-dark-75 font-weight-bolder font-size-h3">+6,5K XSS Case</span>
														<span class="text-muted font-weight-bold mt-2">Vulnerabilities</span>
													</div>
												</div>
												<div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px"></div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 12-->
									</div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        
        @include('components.user-panel')

        @include('theme.global-theme-js')

        <!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/widgets.js') }}"></script>
		<!--end::Page Scripts-->

    </body>
</html>