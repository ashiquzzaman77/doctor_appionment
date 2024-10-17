@extends('frontend.master')
@section('main')
    <section class="container-fluid"
        style="background-image: url('{{ 'frontend/15292559_5544562.jpg' }}'); background-size: cover; background-position: center; height: 600px;">
    </section>

    <section class="container-custom" style="margin-bottom: 120px; margin-top: 50px;">

        <h2 class="text-center mb-4">Doctor Appointment Form</h2>

        <div class="shadow p-5 bg-light">
            <form method="POST" action="{{ route('appointment.doctor') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <!-- Appointment Date -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" name="appointment_date" class="form-control" id="date" required>
                        @error('appointment_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Appointment Time -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="time" class="form-label">Appointment Time</label>
                        <input type="time" name="appointment_time" class="form-control" id="time" required>
                        @error('appointment_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Doctor Selection -->
                    <div class="col-12 col-md-12 mb-3">
                        <label for="doctor" class="form-label">Select Doctor</label>
                        <select class="form-select" name="doctor_id" id="doctor" required>
                            <option disabled selected>Choose...</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Patient Name -->
                    <div class="col-12 col-md-12 mb-3">
                        <label for="firstName" class="form-label">Patient Name</label>
                        <input type="text" name="patient_name" class="form-control" id="firstName" required>
                        @error('patient_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Patient Phone -->
                    <div class="col-12 col-md-12 mb-3">
                        <label for="phone" class="form-label">Patient Number</label>
                        <input type="tel" name="patient_phone" class="form-control" id="phone" required>
                        @error('patient_phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Total Fee -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="total_fee" class="form-label">Total Fee</label>
                        <input type="number" name="total_fee" class="form-control" readonly id="total_fee" min="0">
                        @error('total_fee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Paid Amount -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="paid_amount" class="form-label">Paid Amount</label>
                        <input type="number" name="paid_amount" class="form-control" id="paid_amount" min="0">
                        @error('paid_amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>

        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            // When a doctor is selected
            $('#doctor').change(function() {
                var doctorId = $(this).val();

                if (doctorId) {
                    // Make an AJAX request to get the doctor's fee
                    $.get("{{ url('doctor/fee') }}/" + doctorId, function(data) {
                        if (data.fee) {
                            $('#total_fee').val(data.fee); // Set the fee in the total_fee input
                        }
                    }).fail(function() {
                        toastr.error('Failed to load doctor\'s fee');
                    });
                } else {
                    $('#total_fee').val(''); // Clear the total fee field if no doctor is selected
                }
            });
        });
    </script>
@endsection
