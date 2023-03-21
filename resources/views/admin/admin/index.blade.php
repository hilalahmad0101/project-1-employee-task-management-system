@extends('admin.layouts.app')

@section('title')
    List of Admin
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                
                    <div class="card">
                        <div class="card-header">
                            <h3>List of admin</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list_admin" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td>
                                                <button class="btn btn-danger" id="delete-admin"
                                                    data-id='{{ $admin->id }}'>Delete</button>
                                                    <a href="{{ route('admin.admin.edit', ['id'=>$admin->id]) }}" class="btn btn-primary" 
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
            $('#list_admin').DataTable();
        });

        $(document).on('click', '#delete-admin', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.admin.delete' )}}",
                    data: {
                        id,
                        "_token":"{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: (data) => {
                        if(data.success == true){
                            alert(data.message);
                            window.location.href="{{ route('admin.admin.list' )}}"
                        }else{
                            alert(data.message);

                        }
                    }
                })
            }
        })
    </script>
@endsection
