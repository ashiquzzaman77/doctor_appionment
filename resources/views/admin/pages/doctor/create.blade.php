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
                                <div class="col-12 col-lg-4 mb-4">
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
                                <div class="col-12 col-lg-4 mb-4">
                                    <label for="" class="mb-3">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Doctor Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <!-- Phone -->
                                <div class="col-12 col-lg-4 mb-4">
                                    <label for="" class="mb-3">Phone</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <!-- Fee -->
                                <div class="col-12 col-lg-4 mb-4">
                                    <label for="" class="mb-3">Fee</label>
                                    <input type="number" class="form-control" name="fee" placeholder="Enter Fee" value="{{ old('fee') }}">
                                    @error('fee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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

</x-admin-app-layout>