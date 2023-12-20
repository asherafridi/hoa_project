@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Poll /</span> Create</h4>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Create Poll Form -->
                    <div class="card poll-card">
                        <div class="card-header">
                            <h5 class="card-title">Create a New Poll</h5>
                        </div>
                        <div class="card-body">
                            <form id="createPollForm" method="POST" action="{{ route('admin.polls.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="pollQuestion" class="form-label">Poll Question</label>
                                    <input type="text" class="form-control" name="poll_question" id="pollQuestion"
                                        required>
                                </div>

                                <!-- Poll Options -->
                                <div class="mb-3">
                                    {{-- <label for="options" class="form-label">Poll Options</label> --}}
                                    <div class="poll-options" id="pollOptionsContainer" class="mb-4">
                                        <div class="input-group mb-4">
                                            {{-- <input type="text" class="form-control" name="options[]" required> --}}
                                            <button type="button" class="btn btn-secondary" onclick="addOption()">Add
                                                Option</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Poll</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

        <!-- Your custom script for handling poll creation and dynamic options -->
        <script>
            // Function to add a new option input field
            function addOption() {
                const pollOptionsContainer = document.getElementById("pollOptionsContainer");

                const inputGroup = document.createElement("div");
                inputGroup.classList.add("input-group", "mb-3");

                const inputField = document.createElement("input");
                inputField.type = "text";
                inputField.classList.add("form-control");
                inputField.name = "options[]";
                inputField.required = true;

                const addButton = document.createElement("button");
                addButton.type = "button";
                addButton.classList.add("btn", "btn-outline-danger");
                addButton.textContent = "Remove";
                addButton.addEventListener("click", function() {
                    pollOptionsContainer.removeChild(inputGroup);
                });

                inputGroup.appendChild(inputField);
                inputGroup.appendChild(addButton);

                pollOptionsContainer.appendChild(inputGroup);
            }

            // Your existing JavaScript code here
        </script>



    </div>
@stop
