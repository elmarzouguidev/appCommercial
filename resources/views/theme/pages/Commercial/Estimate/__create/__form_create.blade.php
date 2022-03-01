<div class="row">
    <div class="col-lg-12">
        <form class="repeater" action="{{ route('commercial:estimates.store') }}" method="post">
            @csrf
            <div class="card mb-4">
                <div class="card-body">

                    <p class="card-title-desc">{{__('estimate.form.title')}}</p>

                    <div class="row">
                        <div class="col-lg-6">

                            {{-- @include('theme.pages.Commercial.Estimate.__create.__info') --}}
                            @livewire('commercial.estimate.create.info')

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label>{{__('estimate.form.date_estimate')}}</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" name="estimate_date"
                                                   class="form-control @error('estimate_date') is-invalid @enderror"
                                                   value="{{ now()->format('Y-m-d') }}" data-date-format="yyyy-mm-dd"
                                                   data-date-container='#datepicker1' data-provide="datepicker">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('estimate_date')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label> {{__('estimate.form.date_due')}}</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text"
                                                   class="form-control @error('due_date') is-invalid @enderror"
                                                   name="due_date" value="{{ \ticketApp::estimateDueDate() }}"
                                                   data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                                                   data-provide="datepicker" data-date-autoclose="true">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('due_date')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--@include('theme.pages.Commercial.Estimate.__create.__tickets')--}}
                            @livewire('commercial.estimate.create.tickets')
                        </div>

                        <div class="col-lg-6">
                            <div class=" mb-4">
                                <label>{{__('estimate.form.admin_note')}}</label>
                                <textarea name="admin_notes" id="textarea"
                                          class="form-control @error('admin_notes') is-invalid @enderror"
                                          maxlength="225"
                                          rows="5" placeholder="">
                                </textarea>
                                @error('admin_notes')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-title-desc">{{__('estimate.form.title')}}</p>
                    <div class="row">
                        <div class="col-lg-4 mb-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            @include('theme.pages.Commercial.Estimate.__create.__add_articles')
                        </div>
                        <div class="col-lg-12">
                            <div class="justify-content-end">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            {{__('estimate.form.total_ht')}} :
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-danger">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            {{__('estimate.form.total_ttc')}}:
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-title-desc">{{__('estimate.form.title')}}</p>
                    <div class="row">
                        {{--<div class="mb-3 col-lg-12">
                            <label for="client_notes">{{__('estimate.form.client_note')}}</label>
                            <textarea name="client_notes" id="client_notes"
                                class="form-control @error('client_notes') is-invalid @enderror"></textarea>
                            @error('client_notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>--}}
                        <div class="mb-3 col-lg-12">
                            <label for="condition_general">{{__('estimate.form.condition_general')}}</label>
                            <textarea name="condition_general" id="condition_general"
                                      class="form-control @error('condition_general') is-invalid @enderror">{{config('app-config.estimates.default_condition')}}</textarea>
                            @error('client_note')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                <div class="">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        {{__('buttons.store')}}
                    </button>
                    <button type="submit" class="btn btn-secondary waves-effect waves-light">
                        {{__('buttons.store_draft')}}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
