@extends('templates.template')
@section('content')
@section('title', 'Dictionary')




<form action="{{ route('word.search') }}" method="post">
    @csrf
    {{-- <input type="text" class="input" name="english_word" placeholder="Masukkan kata dalam bahasa Inggris" required> --}}
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="english word" placeholder="Masukkan kata dalam bahasa inggris" aria-label="" aria-describedby="button-addon2">
        <button class="btn btn-outline-success" type="submit" id="button-addon2">Cari</button>
    </div>
    {{-- <button type="submit">Cari</button> --}}
</form>

<a href="/search-history" class="btn btn-primary">History</a>

@endsection