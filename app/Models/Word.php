<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $table = 'words';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'english_word',
        'partOfSpeech1',
        'definition1',
        'example1',
        'partOfSpeech2',
        'definition2',
        'example2',
        'phonetics',
        'audio',
        'licenseName',
        'licenseUrl',
        'source'

    ];
}
