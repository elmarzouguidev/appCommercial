<div class="col-lg-12 mb-4">
    <label for="example-password-input" class="col-md-2 col-form-label">Tickets</label>
    @php
        $selected = $estimate->tickets->pluck('code')->toArray();
        //dd($selected,in_array($ticket->code, $selected))
    @endphp
    <select name="tickets[]"
            class="select2 form-control select2-multiple @error('tickets') is-invalid @enderror"
            multiple="multiple" data-placeholder="Select ..." required>

        <optgroup label="tickets">

            @foreach ($estimate->tickets as $ticket)

                <option
                    value="{{$ticket->id}}"
                    {{ (in_array($ticket->code, $selected)) ? 'selected' : '' }}
                >
                    {{$ticket->code}}

                </option>

            @endforeach

        </optgroup>

    </select>
</div>
