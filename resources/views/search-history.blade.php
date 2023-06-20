@extends('templates.template')
@section('content')
@section('title', 'History Pencarian')

<form action="{{route('word.searchHistory')}}" method="GET">
    @csrf
    <label for="favorite_only">
        <input type="checkbox" name="favorite_only" id="favorite_only" value="1" {{ $favoriteOnly ? 'checked' : '' }}>
        Tampilkan Hanya Favorit
    </label>
    <button type="submit" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
        <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
      </svg> Filter</button>
</form>

<table class="table table-bordered table-striped display mt-3" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kata</th>
            <th>Fonetik</th>
            <th>Part Of Speech (Definition)</th>
            <th>Favorit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php 
    $no =1;
    ?>
    @foreach ($words as $word)
    <tbody>
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $word->english_word }}</td>
            <td>{{ $word->phonetics }}</td>
            <td>{{$word->partOfSpeech}} <br>({{ $word->definition }})</td>
            <td>{{ $word->favorite ? 'Ya' : 'Tidak' }}</td>
            <td>
                <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{route('word.detailHistory', $word->id)}}" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg> Detail</a></li>
                    <li><a href="{{route('word.deleteHistory', $word->id)}}"  class="dropdown-item" data-confirm-delete=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg> Hapus </a></li>
                   

                </ul>
                </div>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<a href="/" class="btn btn-success">Kembali</a>

@endsection





