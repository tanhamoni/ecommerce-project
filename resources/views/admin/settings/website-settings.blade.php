@extends('admin.master')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Update Website Settings</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Website Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Input Settings Data</div>
                            </div>

                            <!--begin::Form-->
                            <form action="{{ url('/owner/website-settings/update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->phone }}"
                                            name="phone" id="phone" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ $websiteSettings->email }}"
                                            name="email" id="email" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" required>{{ $websiteSettings->address }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Facebook Link (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->facebook }}"
                                            name="facebook" id="facebook" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="twitter" class="form-label">Twitter Link (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->twitter }}"
                                            name="twitter" id="twitter" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram Link (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->instagram }}"
                                            name="instagram" id="instagram" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="youtube" class="form-label">Youtube Link (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->youtube }}"
                                            name="youtube" id="youtube" />
                                    </div>

                                    <!-- Logo Section -->
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control" name="logo" id="logo"
                                            accept="image/*" />
                                        <label class="input-group-text" for="logo">Upload Logo</label>
                                    </div>
                                    <p class="text-danger mb-1"><strong>Logo URL in DB:</strong>
                                        {{ $websiteSettings->logo ?? 'NO DATA IN DB' }}</p>
                                    <img src="{{ $websiteSettings->logo }}" height="70" width="150" alt="Logo"
                                        class="mb-3 border p-1">

                                    <!-- Hero Image Section -->
                                    <div class="input-group mb-2 mt-3">
                                        <input type="file" class="form-control" name="hero_image" id="hero_image"
                                            accept="image/*" />
                                        <label class="input-group-text" for="hero_image">Upload Hero Image</label>
                                    </div>
                                    <p class="text-danger mb-1"><strong>Hero URL in DB:</strong>
                                        {{ $websiteSettings->hero_image ?? 'NO DATA IN DB' }}</p>
                                    <img src="{{ $websiteSettings->hero_image }}" height="300" width="800"
                                        alt="Hero Image" class="border p-1">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
