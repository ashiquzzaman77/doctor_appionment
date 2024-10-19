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

                        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Specify that this is a PUT request -->

                            <div class="row">

                                <!-- Department Name -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="department_id" class="mb-3">Department Name</label>
                                    <select name="department_id" class="form-select" id="department_id">
                                        <option disabled>Choose...</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $doctor->department_id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Doctor Name -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="name" class="mb-3">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter Doctor Name" value="{{ old('name', $doctor->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Practice Day -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="practice_day" class="mb-3">Practice Day</label>
                                    {{-- <input type="text" class="form-control" name="practice_day" id="practice_day"
                                        value="{{ old('practice_day', is_array($practiceDays) ? implode(', ', $practiceDays) : $practiceDays) }}"> --}}

                                    <input type="text" class="form-control" name="practice_day" id="practice_day"
                                        value="{{ old('practice_day', $doctor->practice_day) }}">

                                    @error('practice_day')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <!-- Visiting Our -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="" class="mb-3">Visiting Hour</label>
                                    <input type="text" class="form-control" name="visiting_hour"
                                        placeholder="Eg: 5pm - 10pm"
                                        value="{{ old('visiting_hour', $doctor->visiting_hour) }}">
                                    @error('visiting_hour')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-12 col-lg-4 mb-4">
                                    <label for="phone" class="mb-3">Phone</label>
                                    <input type="number" class="form-control" name="phone"
                                        placeholder="Enter Phone Number" value="{{ old('phone', $doctor->phone) }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fee -->
                                <div class="col-12 col-lg-3 mb-4">
                                    <label for="fee" class="mb-3">Fee</label>
                                    <input type="number" class="form-control" name="fee" placeholder="Enter Fee"
                                        value="{{ old('fee', $doctor->fee) }}">
                                    @error('fee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dates -->
                                <div class="col-12 col-lg-4 mb-4">
                                    <div class="form-group">
                                        <label for="dates" class="mb-3">Select Dates:</label>
                                        @foreach ($selectedDates as $index => $date)
                                            <input type="text" class="form-control text-danger" disabled
                                                value="{{ $date }}">
                                        @endforeach
                                        <!-- Optional: Allow the user to add another date -->
                                        <input type="date" name="date[]" class="form-control mb-2"
                                            value="{{ old('date.' . count($selectedDates), '') }}"
                                            placeholder="Add another date" id="date">
                                        @error('date.*')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-lg-12">
                                    <button class="btn btn-primary">Update</button>
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

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector('#practice_day');
            new Tagify(input, {
                whitelist: [], // You can predefine a list of tags if needed
                delimiters: ",| ", // Accepts commas and space as tag delimiters
                maxTags: 10, // Maximum number of tags allowed
                placeholder: "Enter tags"
            });
        });
    </script> --}}

</x-admin-app-layout>
