@extends('include.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Employee Add</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/employee/save') }}" method="post" encType="multipart/form-data">
                @csrf
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name"
                                value="{{ old('first_name', @$data->first_name) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name"
                                value="{{ old('last_name', @$data->last_name) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control chosen" name="company" required>
                                <option value="" disabled selected>Choose...</option>
                                @foreach (@$company as $c)
                                    @if (@$data->company_id == $c->id)
                                        <option selected value="{{ @$c->id }}" selected>{{ @$c->name }}</option>
                                    @else
                                        @if (old('company') == $c->id)
                                            <option value="{{ @$c->id }}" selected>{{ @$c->name }} </option>
                                        @else
                                            <option value="{{ @$c->id }}">{{ @$c->name }} </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone"
                                value="{{ old('phone', @$data->phone) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email"
                                value="{{ old('email', @$data->email) }}" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="{{ @$data->id ?: 0 }}" />
                <div class="mt-4 d-flex  justify-content-end">
                    <button type="submit" class="btn btn-success" style="width: 180px">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
