<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Word;

class WordController extends Controller
{
    public function search(Request $request)
    {
        $englishWord = $request->input('english_word');

        $response = Http::get('https://api.dictionaryapi.dev/api/v2/entries/en/' . $englishWord);
        $responseData = $response->json();

        if ($response->ok() && !empty($responseData)) {
            $wordData = $responseData[0];

            $word = Word::firstOrNew(['english_word' => $englishWord]);


            // WORD
            $word->partOfSpeech = $wordData['meanings'][0]['partOfSpeech'];
            $word->definition = $wordData['meanings'][0]['definitions'][0]['definition'];

            $word->phonetics = $wordData['phonetics'][0]['text'];


            // LICENSE
            $word->licenseName = $wordData['license']['name'];
            $word->licenseUrl = $wordData['license']['url'];

            // SOURCE
            $word->source = $wordData['sourceUrls'][0];


            $word->save();
        } else {
            return redirect()->back()->with('error', 'Kata tidak ditemukan');
        }
        return view('search-result', compact('word'));
    }

    public function saveSearch(Request $request)
    {
        $wordId = $request->input('word_id');

        $word = Word::findOrFail($wordId);
        $word->favorite = true;
        $word->save();

        return redirect('search-history')->with('success', 'Kata berhasil disimpan');
    }

    public function searchHistory(Request $request)
    {
        $favoriteOnly = $request->input('favorite_only');
        $words = Word::when($favoriteOnly, function ($query) {
            return $query->where('favorite', true);
        })->latest()->get();



        return view('search-history', compact('words', 'favoriteOnly'));
    }

    public function detailHistory($id)
    {
        $word = Word::findOrFail($id);
        return view('detail', compact('word'));
    }

    public function deleteHistory($id)
    {
        $word = Word::destroy($id);
        return redirect()->route('word.searchHistory')->with('success', 'Kata Berhasil Dihapus');
    }
}
