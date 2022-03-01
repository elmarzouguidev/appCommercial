<div class="col-lg-12 mb-4">
    <label for="example-password-input" class="col-md-2 col-form-label">Tickets</label>
    @php
        $selected = $invoice->tickets->pluck('code')->toArray();
        //dd($selected,in_array($ticket->code, $selected))
    @endphp
    <select name="tickets[]"
            class="ticketers select2 form-control select2-multiple @error('tickets') is-invalid @enderror"
            multiple="multiple" data-placeholder="Select ..." >

        <optgroup label="tickets">

            @foreach ($invoice->tickets as $ticket)

                <option
                    value="{{$ticket->id}}"
                    id="ticketer-{{$ticket->id}}"
                    data-url= {{route('admin:tickets.single',$ticket->uuid)}}
                    {{ (in_array($ticket->code, $selected)) ? 'selected' : '' }}
                >
                    {{$ticket->code}}

                </option>

            @endforeach

        </optgroup>

    </select>
</div>
