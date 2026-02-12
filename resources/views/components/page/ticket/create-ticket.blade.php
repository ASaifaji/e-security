@props(['users', 'apps'])

<x-subheader.create-ticket />

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <x-card.sticky>
            <x-slot name="header">
                <x-card.card-title title="Create Ticket Form" />
                <x-card.card-toolbar backhref="/tickets"/>
            </x-slot>
            <x-slot name="body">
                <!--begin::Form-->
                <form class="form" id="kt_form">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <x-form.form-section text="Ticket Info:">
                                <x-form.text-input label="Subject" required={{ true }}/>
                                <x-form.text-input label="Description" />
                                <x-form.text-input label="Vulnerabilities Detail" sublabel="Can be Emptied" />
                            </x-form.form-section>
                            <div class="separator separator-dashed my-10"></div>
                            <x-form.form-section text="App Details:">
                                <x-form.select-picker id="app_type" label="Type">
                                    <option value="1">Existing</option>
                                    <option value="2" selected>New</option>
                                </x-form.select-picker>
                                <div id="row_app_name"><x-form.text-input label="App Name" required={{ true }} /></div>
                                <div id="row_pic">
                                    <x-form.select-picker label="PIC" search="true" required={{ true }} >
                                        <option disabled selected>Select</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </x-form.select-picker>
                                </div>
                                <div id="row_app">
                                    <x-form.select-picker id="row_app" label="App" search="true" required={{ true }} >
                                        <option disabled selected>Select</option>
                                        @foreach ($apps as $app)
                                            <option value="{{ $app->id }}">{{ $app->name }}</option>
                                        @endforeach
                                    </x-form.select-picker>
                                </div>
                                @push('scripts')
                                <script>
                                    $(document).ready(function(){
                                        console.log('script loaded')
                                        function toggleAppFields(){
                                            var typeValue = $('#app_type').val()
                                            console.log('selected value:', typeValue)

                                            if (typeValue=='2'){
                                                $('#row_app_name').slideDown(50).find('input').prop('disabled', false);
                                                $('#row_pic').slideDown(50).find('select').prop('disabled', false).selectpicker('refresh');
                                                $('#row_app').slideUp(50).find('select').prop('disabled', true).selectpicker('refresh');
                                            } else{
                                                $('#row_app_name').slideUp(50).find('input').prop('disabled', true);
                                                $('#row_pic').slideUp(50).find('select').prop('disabled', true).selectpicker('refresh');
                                                $('#row_app').slideDown(50).find('select').prop('disabled', false).selectpicker('refresh');
                                            }
                                        }

                                        toggleAppFields();

                                        $('#app_type').change(function(){
                                            toggleAppFields();
                                        });
                                    });
                                </script>
                                @endpush
                            </x-form.form-section>
                            <div class="separator separator-dashed my-10"></div>
                            <x-form.form-section text="Ticket Status:" >
                                <x-form.select-picker label="Priority" >
                                    <option value="1">Critical</option>
                                    <option value="2">High</option>
                                    <option value="3" selected="selected">Medium</option>
                                    <option value="4">Low</option>
                                </x-form.select-picker>
                                <x-form.select-picker label="Severity" >
                                    <option value="1">Critical</option>
                                    <option value="2">Major</option>
                                    <option value="3" selected="selected">Moderate</option>
                                    <option value="4">Low</option>
                                </x-form.select-picker>
                                <x-form.select-picker label="Status" >
                                    <option value="1" selected="selected">Open</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">Pending</option>
                                    <option value="4">Resolved</option>
                                    <option value="5">Closed</option>
                                </x-form.select-picker>
                            </x-form.form-section>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </form>
                <!--end::Form-->
            </x-slot>
        </x-card.sticky>
    </div>
</div>