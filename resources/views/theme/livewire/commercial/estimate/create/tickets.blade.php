<div class="col-lg-12 mb-4" wire:init="loadTickets">
    <label for="example-password-input" class="col-md-2 col-form-label">Tickets</label>
    <select name="tickets[]" id="select-tickets"
            class=" form-control select2-multiple @error('tickets') is-invalid @enderror"
            multiple="multiple" data-placeholder="Select ...">

        <optgroup label="tickets">

            @foreach ($clientTickets as $ticket)

                <option
                    value="{{$ticket->id}}"
                >
                    {{$ticket->code}}

                </option>

            @endforeach

        </optgroup>

    </select>
</div>
