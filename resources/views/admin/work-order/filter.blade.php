<div class="card mb-3">
    <div class="card-header">
        {{-- <h5>Filter</h5> --}}
        <div class="row">

            <form method="get" class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Priority</label>
                        <select class="form-control" name="priority">
                            <option value="">Filter By Priority</option>
                            @foreach (priority_level() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">Priority</label>
                        <select class="form-control" name="status">
                            <option value="">Filter By Status</option>
                            @foreach (workOrder_Status() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Date</label>
                        <input type="text" class="form-control flatpickr-input" name="date" id="flatpickr-range">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Search</label>
                        <input type="text" class="form-control" name="search" id="" placeholder="Search...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label">&nbsp;</label>
                        <input type="submit" class="btn btn-primary form-control"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
