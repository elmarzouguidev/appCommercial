<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List de Diagnostique</h4>
                <p class="card-title-desc"></p>

                <!-- Nav tabs -->
                @include('theme.pages.Diagnostic.__admin.__tap_view.tables.__taps')

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">

                    <div class="tab-pane active" id="diagnistique-attend" role="tabpanel">

                        @include('theme.pages.Diagnostic.__admin.__tap_view.tables.diagnistique-attend')

                    </div>

                    <div class="tab-pane" id="diagnistique-attend-bc" role="tabpanel">

                        @include('theme.pages.Diagnostic.__admin.__tap_view.tables.diagnistique-attend-bc')

                    </div>

                    <div class="tab-pane" id="diagnistique-non" role="tabpanel">
                        @include('theme.pages.Diagnostic.__admin.__tap_view.tables.diagnistique-non')
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
