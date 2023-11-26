@extends('layout.default')
@section('title', 'detail')


@section('content')
    <h1>
        <img src="{{ asset('img/btn-contract.png') }}" alt=""style="width: 50px; height: 50px;">
        Details  documents :{{ $detail->name }}
    </h1>

    <div class="row">
        <div class="col-md-6 ">
            <hr style="border-top: 5px solid #000">
            <table class="table table-bordered mt-4">

                <tbody>

                    <tr>
                        <td>id</td>
                        <td>{{ $detail->id }}</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>{{ $detail->name }}</td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>{{ $detail->description }}</td>
                    </tr>
                    <tr>
                        <td>access</td>
                        <td>{{ $detail->access }}</td>
                    </tr>
                    <tr>
                        <td>created by</td>
                        <td>{{ $detail->createdBy->name }}</td>
                    </tr>
                    <tr>
                        <td>category</td>
                        <td>{{ $detail->category->name }}</td>
                    </tr>
                    <tr>
                        <td>source</td>
                        <td>{{ $detail->source }}</td>
                    </tr>
                    <tr>
                        <td>path</td>
                        <td>{{ $detail->path }}</td>
                    </tr>
                    <tr>
                        <td>created at</td>
                        <td>{{ $detail->created_at }}</td>
                    </tr>
                    <tr>
                        <td>updated at</td>
                        <td>{{ $detail->updated_at }}</td>
                    </tr>



                </tbody>
            </table>
            <hr style="border-top: 5px solid #000">
            <div class="mt-4">
                @if ($detail->canUpdate())
                    <a href="" class="btn btn-primary">Update</a>
                @else
                    <button class="btn btn-primary"disabled>Update</button>
                @endif

                <a href="" class="btn btn-success">Download</a>

                @if ($detail->canDelete() && $detail->isPrivate())
                    <a href="" class="btn btn-danger">Delete</a>
                @else
                    <button class="btn btn-danger" disabled>Delete</button>
                @endif
            </div>
        </div>
        @if ($detail->canAddUser() && $detail->isPrivate() && $detail->created_by == Auth::user()->id)
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="post" action="{{ route('add-perm-us-action') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Sélectionner un utilisateur :</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="permission_id">Sélectionner une permission :</label>
                                <select class="form-control" name="permission_id" id="permission_id">
                                    <option value="1">Read-Only</option>
                                    <option value="2">Read-write</option>

                                </select>
                            </div>
                            <input type="hidden" name="document_id" value="{{ $detail->id }}">
                        </div>

                        <div class="col-md-3 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">ADD</button>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>name</th>
                            <th>permissions</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usersPermissions as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->pivot->permission_id == 1)
                                        read only
                                    @elseif ($user->pivot->permission_id == 2)
                                        read-write
                                    @else
                                        permission non affectée
                                    @endif
                                </td>
                                <td>
                                    @if ($detail->canDelete() && $detail->isPrivate())
                                        <a href="" class="btn btn-danger">Delete</a>
                                    @else
                                        <button class="btn btn-danger" disabled>Delete</button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="col-md-6">
                    <table class="table table-bordered mt-4" col>
                        <thead class="thead-dark">
                            <tr>
                                <th>name</th>
                                <th>permissions</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersPermissions as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if ($user->pivot->permission_id == 1)
                                            read only
                                        @elseif ($user->pivot->permission_id == 2)
                                            read-write
                                        @else
                                            permission non affectée
                                        @endif
                                    </td>
                                    <td>
                                        @if ($detail->canDelete() && $detail->isPrivate())
                                            <a href="" class="btn btn-danger">Delete</a>
                                        @else
                                            <button class="btn btn-danger" disabled>Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endif


        {{-- @endif --}}



    </div>
    </div>
    </div>

@endsection
