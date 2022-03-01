<div class="col-lg-12 mb-4">
    <label for="example-password-input" class="col-md-2 col-form-label">Tickets</label>
    <select name="tickets[]" id="select-tickets"
            class=" form-control select2 select2-multiple @error('tickets') is-invalid @enderror"
            multiple="multiple" data-placeholder="Select ..." required>

        <optgroup label="tickets">

            @foreach ($tickets as $ticket)

                <option
                    value="{{$ticket->id}}"
                >
                    {{$ticket->code}}

                </option>

            @endforeach

        </optgroup>

    </select>
</div>
