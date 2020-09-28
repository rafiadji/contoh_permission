@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('List') }}
                    @can('write post')
                        <a  class="float-right" href="{{ route('posts.create') }}"> Create New Post</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th width='280px'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                            @can('publish post')
                                            <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                            @endcan
                                            @can('edit post')
                                            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                            @endcan
                                            @role('admin')
                                            @csrf
                                            @method('DELETE')
                            
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            @endrole
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
