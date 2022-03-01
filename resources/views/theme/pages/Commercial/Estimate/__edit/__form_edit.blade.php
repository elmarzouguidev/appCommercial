<div class="row">
    <div class="col-lg-8">
        <form class="repeater" action="{{ $estimate->update_url}}" method="post">
            @csrf
            <div class="card mb-4">
                <div class="card-body">

                    <p class="card-title-desc">Entrer les information de devis</p>

                    <div class="row">
                        <div class="col-lg-6">

                            @include('theme.pages.Commercial.Estimate.__edit.__info')


                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label>* Date de Devis</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" name="estimate_date"
                                                   class="form-control @error('estimate_date') is-invalid @enderror"
                                                   value="{{ $estimate->estimate_date->format('Y-m-d') }}"
                                                   data-date-format="yyyy-mm-dd"
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
                                        <label> Date d'échéance</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text"
                                                   class="form-control @error('due_date') is-invalid @enderror"
                                                   name="due_date" value="{{ $estimate->due_date->format('Y-m-d') }}"
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

                        </div>

                        <div class="col-lg-6">
                            <div class=" mb-4">
                                <label>Note Admin</label>
                                <textarea name="admin_notes" id="textarea"
                                          class="form-control @error('admin_notes') is-invalid @enderror"
                                          maxlength="225"
                                          rows="5">{{$estimate->admin_notes}}</textarea>

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
                    <p class="card-title-desc">Entrer les Détails de devis</p>
                    <div class="row">
                        <div class="col-lg-4 mb-4">

                        </div>
                    </div>
                    <div class="row" id="articles_list">
                        <div class="col-lg-12 mb-4">
                            @include('theme.pages.Commercial.Estimate.__edit.__edit_articles')
                        </div>
                        <div class="col-lg-12">
                            <div class="justify-content-end">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant HT : {{$estimate->formated_price_ht}} DH
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-info">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant TTC : {{$estimate->formated_price_total}} DH
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-danger">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant TVA : {{$estimate->formated_total_tva}} DH
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
                    <p class="card-title-desc">Autre information</p>
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <label for="condition_general">Conditions générales de vente</label>
                            <textarea name="condition_general" id="condition_general"
                                      class="form-control @error('condition_general') is-invalid @enderror">{{$estimate->condition_general}}</textarea>
                            @error('condition_general')
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
                        Update
                    </button>
                    <button type="submit" class="btn btn-secondary waves-effect waves-light">
                        Sauvegarder en tant que brouillon
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div class="col-lg-4">
        @include('theme.pages.Commercial.Estimate.__edit.__estimate_actions')
    </div>

</div>
@include('theme.pages.Commercial.Estimate.__datatable.__send_estimate' )
