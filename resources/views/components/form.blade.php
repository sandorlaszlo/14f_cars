<form class="row row-cols-lg-auto p-2 my-3 align-items-center" action="/search-by-name" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="carname">Name of car:</label>
    </div>
    <div class="col-12">
        <input type="text" class="form-control" id="carname" name="carname" placeholder="enter the name of the car">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
