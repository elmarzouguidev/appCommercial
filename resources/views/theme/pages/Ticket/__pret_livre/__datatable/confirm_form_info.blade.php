<div class="row">
    <div class="col-lg-12">
        <div class="mb-4">
            <label class="form-label">* Date de sortie *</label>

            <div class="input-group" id="datepicker1">
                <input type="date" name="date_end" class="form-control @error('date_end') is-invalid @enderror"
                       value="{{ now()->format('Y-m-d') }}"
                       required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                @error('date_end')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-4">
            <label class="form-label">Mode de sortie *</label>

            <select name="mode" class="form-select @error('mode') is-invalid @enderror" required>
                <option value=""></option>
                <option value="parmoi">Par Moi</option>
                <option value="parclient">Par Client</option>
            </select>
            @error('mode')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>
<div class="docs-options">
    <label class="form-label">nom de client</label>
    <div class="input-group mb-4">

        <input type="text" class="form-control @error('info_client') is-invalid @enderror" name="info_client"
               value="" aria-describedby="ref">
        @error('info_client')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
