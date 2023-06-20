@extends('templates.template')
@section('content')
@section('title', 'Detail Kata')
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
    <tr>
        <td>Kata Favorit</td>
        <td>:</td>
        <td>{{$word->favorite ? 'Ya' : 'Tidak'}}</td>
    </tr>
    <tr>
        <td>Dibuat</td>
        <td>:</td>
        <td>{{ date('d-m-Y H:i:s', strtotime($word->created_at ))}}</td>
    </tr>
    <tr>
        <td>Diupdate</td>
        <td>:</td>
        <td>{{ date('d-m-Y H:i:s', strtotime($word->updated_at)) }}</td>
    </tr>
</table>
<a href="/search-history" class="btn btn-success">Kembali</a>

@endsection