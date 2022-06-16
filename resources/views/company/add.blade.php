@extends('include.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Company Add</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/company/save') }}" method="post" encType="multipart/form-data">
                @csrf
                <div class="row">
					@if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Logo</label>
                            @if (@$data->logo)
                            <img class="img-thumbnail" src="{{ asset('storage/'.@$data->logo) }}" style="height: 100px; width: 150px;">
                            @endif
                            <input type="file" class="form-control form-control-file" name="logo" accept="image/*">
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',@$data->name)}}" required>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{old('email',@$data->email)}}" required>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control" name="website" value="{{old('website',@$data->website)}}" required>
                         </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="{{ @$data->id?:0 }}" />
                <div class="mt-4 d-flex  justify-content-end">
                    <button type="submit" class="btn btn-success" style="width: 180px">Save</button>
                 </div>
            </form>
        </div>
    </div>
@endsection

