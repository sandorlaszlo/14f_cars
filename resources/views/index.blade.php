<x-layout>
    <div class="d-flex justify-content-around">
        <x-form/>
        {{-- @dd($origins) --}}
        <x-origin proba="akarmi" :origins="$origins"/>
    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th><a href="/?sort={{$header}}">{{ $header }}</a></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    @foreach ($car as $field)
                        <td>{{ $field }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
