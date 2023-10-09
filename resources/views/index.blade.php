<x-layout>
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
