@extends('admin.layouts.app')

@section('title')
    List of Employees
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                
                    <div class="card">
                        <div class="card-header">
                            <h3>List of Employee</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list_employee" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td><img src="{{ asset('storage') }}/{{ $employee->image }}" width="60" alt=""></td>
                                            <td>{{ $employee->city }}</td>
                                            <td><button class="btn btn-danger" id="delete-employee"
                                                    data-id='{{ $employee->id }}'>Delete</button>
                                                    <a href="{{ route('admin.employee.edit', ['id'=>$employee->id]) }}" class="btn btn-primary" 
                                                    >Edit</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('#list_employee').DataTable();
        });

        $(document).on('click', '#delete-employee', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.employee.delete' )}}",
                    data: {
                        id,
                        "_token":"{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: (data) => {
                        if(data.success == true){
                            alert(data.message);
                            window.location.href="{{ route('admin.employee.list' )}}"
                        }else{
                            alert(data.message);

                        }
                    }
                })
            }
        })
    </script>
@endsection
