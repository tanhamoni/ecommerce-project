@extends('admin.master')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Update Website Settings</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <form action="{{ url('/owner/website-settings/update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->phone }}" name="phone" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ $websiteSettings->email }}" name="email" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" required>{{ $websiteSettings->address }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Facebook Link</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->facebook }}" name="facebook" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Twitter Link</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->twitter }}" name="twitter" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Instagram Link</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->instagram }}" name="instagram" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Youtube Link</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->youtube }}" name="youtube" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Logo Image URL</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->logo }}" name="logo" placeholder="https://example.com/logo.png" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hero Image URL</label>
                                        <input type="text" class="form-control" value="{{ $websiteSettings->hero_image }}" name="hero_image" placeholder="https://example.com/hero.png" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection