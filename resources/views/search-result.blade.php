@extends('templates.template')
@section('content')
@section('title', 'Hasil Pencarian : '.  $word->english_word )

<table class="table table-bordered table-striped">
    <tr>
        <td>English Word</td>
        <td>:</td>
        <td>{{ $word->english_word }}</td>
    </tr>
    <tr>
        <td>Phonetics</td>
        <td>:</td>
        <td>{{ $word->phonetics }}</td>
    </tr>
    <tr>
        <td>Part Of Speech (Definition)</td>
        <td>:</td>
        <td>{{ $word->partOfSpeech }}<br>({{ $word->definition }})</td>
    </tr>
   

    <tr>
        <td>License Name</td>
        <td>:</td>
        <td>{{ $word->licenseName }}</td>
    </tr>
    <tr>
        <td>License URL</td>
        <td>:</td>
        <td><a href="{{$word->licenseUrl}}">{{ $word->licenseUrl }}</a></td>
    </tr>
    <tr>
        <td>Source</td>
        <td>:</td>
        <td><a href="{{ $word->source }}">{{ $word->source }}</a></td>
    </tr>
</table>

<form action="{{ route('word.saveSearch')}}" method="POST">
    @csrf
    <input type="hidden" name="word_id" value="{{ $word->id }}">
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/" class="btn btn-primary pull-right">Kembali</a>
</form>

@endsection