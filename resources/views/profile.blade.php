<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Datos - {{$user->name}}</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="{{route('home')}}" class="d-block bg-danger text-white py-1 text-decoration-none ">Regresar</a>

            <div class="col-12 my-3 pt-3 shadow">

                <img src="{{$user->image->url}}" alt="" class="float-left rounded-circle mb-4">
                <h2>Datos personales del usuario </h2>
                <ul>
                    <li>
                        <b> Nombre:</b> {{$user->name}}
                    </li>
                    <li>
                        <b> Email:</b> {{$user->email}}
                    </li>
                </ul>
                <hr>
                <h3 class="mt-4">Redes sociales</h3>
                <ol>
                    <li>{{$user->profile->github}}</li>
                    <li>
                        <a href="{{$user->profile->website}}" target="_blank">{{$user->profile->website}}</a>

                    </li>
                </ol>
                <p>
                    <strong>País</strong>: {{$user->location->pais}}
                    <br>
                    <strong>Nivel</strong>:
                    @if($user->level)
                    {{$user->level->nombre}}
                    @else
                    el usuario no posee un nivel.
                    @endif
                </p>
                <hr>
                <strong>Grupos:</strong>
                @forelse($user->groups as $group)
                <span class="badge bg-success">{{$group->nombre}}</span>
                @empty
                <em>No pertenece a ningun grupo</em>
                @endforelse
                <h3 class="mt-4 text text-center my-4">Posts</h3>
                <div class="row">
                    @forelse($posts as $post)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$post->image->url}}" alt="" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <h6 class="card-subtitle text-muted">
                                        <br>
                                        <b class="text-success"> Título: </b>{{$post->nombre}}
                                        <br>
                                        <b class="text-info"> Categoría: </b> {{$post->category->nombre}}
                                        <br>
                                        {{$post->comments_count}}
                                        {{Str::plural('comentario',$post->comments_count)}}
                                    </h6>
                                    <p class="card-text small">
                                        @foreach($post->tags as $tag)
                                        <span>
                                            #{{$tag->nombre}}
                                        </span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <em>No existen posts para este usuario</em>
                    @endforelse
                </div>
                <h3 class="mt-4 text text-center my-4">Vídeos</h3>
                <div class="row">
                    @forelse($videos as $video)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$video->image->url}}" alt="" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <h6 class="card-subtitle text-muted">
                                        <br>
                                        <b class="text-success"> Título: </b>{{$video->nombre}}
                                        <br>
                                        <b class="text-info"> Categoría: </b> {{$video->category->nombre}}
                                        <br>
                                        {{$video->comments_count}}
                                        {{Str::plural('comentario',$video->comments_count)}}
                                    </h6>
                                    <p class="card-text small">
                                        @foreach($video->tags as $tag)
                                        <span>
                                            # {{$tag->nombre}}
                                        </span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <em>No existen vídeos para este usuario</em>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>

</html>

