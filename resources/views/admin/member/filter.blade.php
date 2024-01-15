<div class="card mb-3">
    <style>
        .select2 {
            display: block;
            width: 100% !important;
        }

        .form-contro {
            display: block;
            width: 100%;
        }
    </style>
    <div class="card-header">
        {{-- <h5>Filter</h5> --}}
        <div class="row">

            <form method="get" class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Lot Number</label>
                        <input type="text" class="form-contro" name="lot_number" value="{{ request('lot_number') }}"
                            id="lotNumberInput" placeholder="Search...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Properties</label>
                        <select class="form-control select2" name="property" id="propertyId">
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
                        <label for="" class="form-label">Filter By Phase</label>
                        <select class="form-control select2" name="phase" id="phase">
                            <option value="">Select Phase</option>
                            @foreach ($phase as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('phase') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Block</label>
                        <select class="form-control select2" name="block" id="block">
                            <option value="">Select Block</option>
                            @foreach ($block as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('block') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Filter By Status</label>
                        <select class="form-control select2" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Unapproved
                            </option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Approved</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Search</label>
                        <input type="text" class="form-contro" name="search" value="{{ request('search') }}"
                            id="searchInput" placeholder="Search...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">&nbsp;</label>
                        <button id="searchBtn" class="btn btn-primary form-control">Search</button>
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
