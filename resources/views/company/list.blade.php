@extends('include.template')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Company</h4>
            <div class="card-toolbar">
            <a href="{{ url('/company/add') }}" class="btn btn-dark">Add Comapny</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>{{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (@$data)
                                @foreach (@$data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->website }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td style="width: 15%">
                                            <div class="form-button-action">
                                                <a title="Edit" class="btn btn-secondary btn-sm"
                                                 href="{{ url('/company/add') . '/' . $d->id }}">
                                                 <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a title="Delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete?');" href="{{ url('/company/delete') . '/' . $d->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
