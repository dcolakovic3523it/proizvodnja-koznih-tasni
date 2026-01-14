<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;

class KorpaController extends Controller
{
    public function dodaj(Request $request, Proizvod $proizvod)
    {
        $korpa = session()->get('korpa', []);

        if(isset($korpa[$proizvod->id])) {
            $korpa[$proizvod->id]['kolicina']++;
        }
        else {
            $korpa[$proizvod->id] = [
                'naziv' => $proizvod->naziv,
                'cena' => $proizvod->cena,
                'slika' => $proizvod->slika,
                'kolicina' => 1
            ];
        }

        session()->put('korpa', $korpa);

        return redirect()->route('narudzbinas.create')->with('success', $proizvod->naziv . ' je dodata u korpu!');
    }

    public function ukloni($proizvodId)
    {
        $korpa = session('korpa', []);

        if(isset($korpa[$proizvodId])){
            unset($korpa[$proizvodId]);
            session(['korpa' => $korpa]);
        }

        return redirect()->back()->with('success', 'Proizvod je uklonjen iz korpe.');
    }

}
