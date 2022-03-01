<div class="mb-3 row">
    <label for="example-password-input" class="col-md-2 col-form-label">Permissions</label>
    <div class="col-md-10">

        @php
            $selected = $admin->getPermissionNames()->toArray();
            //dd($selected)
        @endphp
        <select name="permissions[]" class="select2 form-control select2-multiple @error('permissions') is-invalid @enderror"
            multiple="multiple" data-placeholder="Select ...">

            <optgroup label="Permissions">

                @foreach ($permissions as $permission)

                 <option 
                   value="{{$permission->name}}"
                   
                   {{ (in_array($permission->name, $selected)) ? 'selected' : '' }}
                 >
                    {{$permission->name}}

                </option>

                @endforeach

            </optgroup>

        </select>
        @error('permissions')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>