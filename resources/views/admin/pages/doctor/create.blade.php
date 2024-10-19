<x-admin-app-layout>

    <div class="page-content" style="margin-top: 150px">
        <div class="row my-auto">

            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-baseline mb-2">

                            <h4 class="card-title mb-5">Create Doctor</h4>
                            <a href="{{ route('admin.doctor.index') }}" class="btn btn-outline-primary px-4">Back</a>

                        </div>

                        <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Department Name -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="" class="mb-3">Department Name</label>
                                    <select name="department_id" class="form-select">
                                        <option selected disabled>Choose...</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Doctor Name -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="" class="mb-3">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter Doctor Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Practice Day -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="practice_day" class="mb-3">Practice Day</label>
                                    <input type="text" class="form-control" name="practice_day" id="practice_day"
                                        value="{{ old('practice_day') }}">
                                    @error('practice_day')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Visiting Our -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="" class="mb-3">Visiting Hour</label>
                                    <input type="text" class="form-control" name="visiting_hour"
                                        placeholder="Eg: 5pm-10pm" value="{{ old('visiting_hour') }}">
                                    @error('visiting_hour')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-12 col-lg-4 mb-4">
                                    <label for="" class="mb-3">Phone</label>
                                    <input type="number" class="form-control" name="phone"
                                        placeholder="Enter Phone Number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fee -->
                                <div class="col-12 col-lg-2 mb-4">
                                    <label for="" class="mb-3">Fee</label>
                                    <input type="number" class="form-control" min="0" name="fee"
                                        placeholder="Enter Fee" value="{{ old('fee') }}">
                                    @error('fee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- date -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <div class="form-group">
                                        <label for="dates" class="mb-3">Select Dates:</label>
                                        <input type="date" id="date" placeholder="select date..." name="date[]"
                                            class="form-control" multiple>
                                        @error('date.*')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-lg-12">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Tagify CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.11.0/dist/tagify.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.11.0/dist/tagify.min.js"></script>



    <script>
        flatpickr("#date", {
            mode: "multiple",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                // You can handle selected dates here
                console.log(selectedDates);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector('#practice_day');
            new Tagify(input, {
                whitelist: [], // You can predefine a list of tags if needed
                delimiters: ",| ", // Accepts commas and space as tag delimiters
                maxTags: 10, // Maximum number of tags allowed
                placeholder: "Enter tags"
            });
        });
    </script>



</x-admin-app-layout>
