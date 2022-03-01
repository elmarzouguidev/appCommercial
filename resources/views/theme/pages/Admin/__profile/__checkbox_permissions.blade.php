<div class="panel-body">
    <div class="row">
        <div class="col-md-10">
            @php
                $selected = $admin->getPermissionNames()->toArray();
                //dd($selected)
            @endphp

            @foreach ($permissions as $permission)
                <div class="form-check checkbox" style="{{--display: inline-block;--}}">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        id="permission-{{ $permission->id }}"
                        {{ in_array($permission->name, $selected) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
            @error('permissions')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>
