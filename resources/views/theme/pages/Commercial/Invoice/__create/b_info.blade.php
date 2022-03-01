<div class="col-lg-12 mt-3">
    <div class="row">
        <p class="card-title-desc">Réferences client</p>
        <div class="col-lg-6">
            <label>BC</label>
            <div class="input-group">
                <input type="number" name="bc_code" class="form-control @error('bc_code') is-invalid @enderror">

                @error('bc_code')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-lg-6">
            <label>BL</label>
            <div class="input-group">
                <input type="number" name="bl_code" class="form-control @error('bl_code') is-invalid @enderror">
                @error('bl_code')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
