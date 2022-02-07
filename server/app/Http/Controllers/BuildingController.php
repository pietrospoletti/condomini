<?php

namespace App\Http\Controllers;

use App\Models\building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function buildings(){
        return building::orderBy("created_at","ASC")->get();
    }

    public function building($id){
        return building::findOrFail($id);
    }

    public function addbuilding(Request $request){
        $buildingData = json_decode($request->getContent());
        $newBuilding = new building();
        $newBuilding -> nome = $buildingData->nome;
        $newBuilding -> foto = $buildingData->foto;
        $newBuilding -> comune = $buildingData->comune;
        $newBuilding -> provincia = $buildingData->provincia;
        $newBuilding -> indirizzo = $buildingData->indirizzo;
        $newBuilding -> cap = $buildingData->cap;
        $newBuilding -> numappartamenti = $buildingData->numappartamenti;
        $newBuilding -> consumo = $buildingData->consumo;
        $newBuilding -> gestrem = $buildingData->gestrem;
        $newBuilding -> contabilizzazione = $buildingData->contabilizzazione;
        $newBuilding -> sonda = $buildingData->sonda;
        $newBuilding -> dispositivi = $buildingData->dispositivi;
        $newBuilding -> save();
        return $newBuilding;
    }

    public function edit(Request $request, $id){
        $buildingData = json_decode($request->getContent());
        $building = building::find($id);
        $building->nome = $buildingData->nome;
        $building->foto = $buildingData->foto;
        $building->comune = $buildingData->comune;
        $building->provincia = $buildingData->provincia;
        $building->indirizzo = $buildingData->indirizzo;
        $building->cap = $buildingData->cap;
        $building->numappartamenti = $buildingData->numappartamenti;
        $building->consumo = $buildingData->consumo;
        $building->gestrem = $buildingData->gestrem;
        $building->contabilizzazione = $buildingData->contabilizzazione;
        $building->sonda = $buildingData->sonda;
        $building->dispositivi = $buildingData->dispositivi;
        $building->save();
        return $building;
    }

    public function delete($id){
        $building = building::destroy($id);
        return $building;
    }
}
