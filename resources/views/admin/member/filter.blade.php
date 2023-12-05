<div class="card mb-3">
    <div class="card-header">
        {{-- <h5>Filter</h5> --}}
        <div class="row">

            <form method="get" class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Lot Number</label>
                        <input type="number" class="form-control" name="lot_number" value="{{ request('lot_number') }}"
                            id="" placeholder="Search...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Properties</label>
                        <select class="form-control" name="property">
                            <option value="">Select Property</option>
                            @foreach ($properties as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('property') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Unapproved</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Approved</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Search</label>
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                            id="" placeholder="Search...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">&nbsp;</label>
                        <input type="submit" class="btn btn-primary form-control" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">&nbsp;</label>
                        <input type="submit" value="Download CSV" name="download"
                            class="form-control btn btn-secondary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
