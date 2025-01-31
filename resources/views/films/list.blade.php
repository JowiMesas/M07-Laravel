<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center text-danger display-4">{{$title}}</h1>

        @if(empty($films))
            <div class="alert alert-danger text-center mt-4" role="alert">
                🎥 No se ha encontrado ninguna película
            </div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover text-center bg-light shadow-lg">
                    <thead class="bg-danger text-white">
                        <tr>
                            @foreach($films as $film)
                                @foreach(array_keys($film) as $key)
                                    <th class="p-3 text-uppercase">{{$key}}</th>
                                @endforeach
                                @break
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td class="p-3 font-weight-bold">{{$film['name']}}</td>
                                <td class="p-3">{{$film['year']}}</td>
                                <td class="p-3">{{$film['genre']}}</td>
                                <td class="p-3">{{$film['country']}}</td>
                                <td class="p-3">{{$film['duration']}} min</td>
                                <td class="p-3">
                                    <img src="{{$film['img_url']}}" class="img-thumbnail" style="width: 100px; height: 120px;" alt="Imagen de {{$film['name']}}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>