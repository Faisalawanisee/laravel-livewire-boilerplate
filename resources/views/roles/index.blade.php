@section('page.title', 'Users Roles')

<x-app-layout>
    <div class="right">
        <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="white-box">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    <a class="btn btn-success" href="{{ route('roles.destroy',$role->id) }}"> Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
