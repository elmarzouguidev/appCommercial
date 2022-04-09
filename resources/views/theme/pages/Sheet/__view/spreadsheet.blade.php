@extends('theme.layouts.app')

@section('sheet')
    <h2>{{ $sheet->name }}</h2>
    <div id="sheeter"></div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
    <script>
        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        let data = @json($sheet->content);

        let container = document.getElementById('sheeter');
        let table = new Handsontable(container, {

            dropdownMenu: true,
            data: data,
            rowHeaders: true,
            colHeaders: true,
            minCols: 26,
            minRows: 26,
            width: '100%',
            height: 'auto',
            manualColumnResize: true,
    
            afterChange: function(change, source) {
                if (source === 'loadData') return;

                console.log(change, source, data);

                fetch('{{ route('sheet:update', $sheet->uuid) }}', {
                    method: 'PUT',
                    body: JSON.stringify({
                        content: data
                    }),
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin'
                })
            },
            licenseKey: 'non-commercial-and-evaluation' // for non-commercial use only
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" type="text/css">
@endsection
