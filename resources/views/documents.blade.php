@extends('layout.default')

@section('pageTitle')
    My Documents
@endsection

@section('content')
    <div class="container">
        <h3 style="margin:35px 0 ; ">
            <img src="{{ asset('img/btn-contract.png') }}" alt=""style="width: 50px; height: 50px;">
            Search documents filtered:​
        </h3>
        {{-- formulaire de filtre --}}
        <form method="GET" action="#" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category" id="category">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3">
                    <label for="owner">Owner:</label>
                    <select class="form-control" name="owner" id="owner">
                        <option value="">All Owners</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3">
                    <label for="access">Access:</label>
                    <select class="form-control" name="access" id="access">
                        <option value="">All Access</option>
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>
        {{-- tableau des documents --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>category</th>
                    <th>owner</th>
                    <th>source</th>
                    <th>access</th>
                    <th colspan="2" style="text-align: center;">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($list as $document)
                    <tr>
                        <td>{{ $document->id }} </td>
                        <td>{{ $document->name }}</td>
                        <td>{{ $document->category->name }}</td>
                        <td>{{ $document->createdBy->name }}</td>
                        <td>{{ $document->source }}</td>
                        <td>
                            @if ($document->access == 'private')
                                @if ($document->created_by == Auth::user()->id)
                                    <img src="{{ asset('img/Image5.png') }}" alt="Lock">
                                @elseif ($document->usersPermissions()->where('user_id', Auth::user()->id)->exists())
                                    <img src="{{ asset('img/Image7.png') }}" alt="Share">
                                @else
                                    <img src="{{ asset('img/Image4.png') }}" alt="Private">
                                @endif
                            @else
                                <img src="{{ asset('img/Image6.png') }}" alt="Public"style="width: 20px; height: 20px;">
                            @endif
                        </td>
                        <td>
                            @if ($document->isPrivate())
                                @if (
                                    $document->created_by == Auth::user()->id ||
                                        $document->usersPermissions()->where('user_id', Auth::user()->id)->exists())
                                    <a href="{{ route('show-doc-page', ['id' => $document->id]) }}"><img
                                            src="{{ asset('img/Image3.png') }}" alt=""></a>
                                @else
                                    <img src="{{ asset('img/Image1.png') }}" disabled>
                                @endif
                            @else
                                <a href="{{ route('show-doc-page', ['id' => $document->id]) }}"><img
                                        src="{{ asset('img/Image3.png') }}" alt=""></a>
                            @endif
                            {{-- @if ($document->access == 'private')
                                delete
                            @else
                                <a href="{{ route('remove-doc-action', ['id' => $document->id]) }}">delete</a>
                            @endif --}}
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
