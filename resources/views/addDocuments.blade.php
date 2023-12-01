@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
        <h3 style="margin:35px 0 ; ">
            <img src="{{asset('img/btn-add-document.png')}}" alt=""style="width: 50px; height: 50px;">
            ADD YOUR DOCUMENTS​</h3>
        
        @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        
            
        @endif
        <form action="{{route('add-form-doc-action')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Document Name</label>

                <input type="text" class="form-control" id="name" name="name" >
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                    
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" rows="3" id="description" name="description"></textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

           

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id" >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="source">Source</label>
                <input type="text" class="form-control" id="source" name="source" >
                @error('source')
                <small class="text-danger">{{ $message }}</small>
                    
                @enderror
            </div>

            <div class="form-group">
                <label for="file">files</label>
                <input type="file" class="form-control" id="file" name="file">
                @error('file')
                <small class="text-danger">{{ $message }}</small>
                    
                @enderror
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn">
                                <input type="radio" name="access" id="private" value="private" > Private
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn">
                                <input type="radio" name="access" id="public" value="public" > Public
                            </label>
                        </div>
                        
                    </div>


                </div>
                @error('access')
                <small class="text-danger">{{ $message }}</small>
                    
                @enderror
            </div>

           

            <button type="submit" class="btn btn-primary">Add Document</button>
        </form>
        </div>
        <div class="col-md-6">
            <div class="text-center mt-4">
            <img src="{{ asset('img/téléchargement.png') }}" alt="Votre Image" style="width: 400px;">
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
