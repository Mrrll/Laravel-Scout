@extends('layouts.plantilla')

@section('title', 'Welcome')

@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Welcome</h1>
        <table class="table table-striped">
            <thead>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                    </tr>
                @empty
                    <tr>

                        No hay registros

                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </main>
@endsection
