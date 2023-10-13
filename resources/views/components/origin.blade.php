{{-- @dd($origins) --}}
<form class="row row-cols-lg-auto p-2 my-3 align-items-center" action="/search-by-origin" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="carname">Origin:</label>
    </div>
    <div class="col-12">
        <select class="form-select" id="origin" name="origin">
            @foreach ($origins as $origin)
                <option value="{{ $origin }}">{{ $origin }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>