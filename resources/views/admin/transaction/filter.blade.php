<div class="card mb-4 p-3">
    <form class="row" method="GET">
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="form-label">Transaction Type</label>
                <select class="form-control" name="type">
                    <option value="">Filter By Type</option>
                    @foreach ($transaction_type as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="form-label">Search</label>
                <input type="text" placeholder="Search..." name="search" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="" class="form-label">&nbsp;</label>
                <input type="submit" value="Search" name="submit" class="form-control btn btn-primary">
            </div>
        </div>
    </form>
</div>
