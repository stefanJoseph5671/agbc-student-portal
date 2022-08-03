@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            {{-- <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total users</h5>
                                        <span class="h2 font-weight-bold mb-0">1</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div> --}}
        </div>
    </div>

    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block page-title" href="{{ route('home') }}">User
        Management</a>

    <div class="container-fluid mt--7">
        {{-- User List --}}
        <div class="row" id="userList">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-primary" onclick="addUser()">Add user</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <div class="d-flex justify-content-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add User --}}
        <div class="row" id="addUser" style="display: none;">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add New User</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-primary" onclick="goBack()">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <form name="add-blog-post-form" id="add-blog-post-form">
                            @csrf
                             <div class="form-group">
                               <label for="name">Name</label>
                               <input type="text" id="name" name="name" class="form-control" required="">
                             </div>
                             <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" id="email" name="email" class="form-control" required="">
                             </div>
                             <button type="submit" class="btn btn-primary">Create User</button>
                           </form>
                    </div>

                </div>
                {{-- <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        function addUser() {
            var x = document.getElementById("userList");
            var y = document.getElementById("addUser");
            x.style.display = "none";
            y.style.display = "block";
        }

        function goBack() {
            var x = document.getElementById("userList");
            var y = document.getElementById("addUser");
            x.style.display = "block";
            y.style.display = "none";
        }
    </script>
@endpush
