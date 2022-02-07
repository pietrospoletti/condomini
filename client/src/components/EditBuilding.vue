<template>
<div class="h-screen flex flex-col items-center w-auto">
<input type="text" class='w-96 p-1' v-model="building.nome" placeholder="Nome edificio">
<input type='text' class='w-96 p-1' v-model="building.foto" placeholder="inserisci un link dell'immagine del condiminio">
<input type='text' class='w-96 p-1' v-model="building.comune" placeholder="Comune">
<input type='integer' class='w-96 p-1' v-model="building.provincia" placeholder="Provincia">
<input type='text' class='w-96 p-1' v-model="building.indirizzo" placeholder="Indirizzo">
<input type='number' class='w-96 p-1' v-model="building.cap" placeholder="CAP">
<input type='number' class='w-96 p-1' v-model="building.numappartamenti" placeholder="Numero appartamenti">
<input type='number' class='w-96 p-1' v-model="building.consumo" placeholder="Comsumo complessivo annuo">
<input type='boolean' class='w-96 p-1' v-model="building.gestrem" placeholder="Gestione remota">
<input type='text' class='w-96 p-1' v-model="building.contabilizzazione" placeholder="Tipo contabilizzazione">
<input type='text' class='w-96 p-1' v-model="building.sonda" placeholder="Tipo sonda">
<input type='text' class='w-96 p-1' v-model="building.dispositivi" placeholder="Tipo dospositivi">
<button class='flex flex-row bg-green-200 pr-5 pl-5 pt-2 pb-2 rounded-lg' @click="edit()">Salva</button>
</div>
</template>


<script>
import axios from 'axios';
export default {
    name:"EditBuilding",
    data(){
    return {
        building:{
            nome : "",
            foto : "",
            comune : "",
            provincia :"",
            indirizzo : "",
            cap: 0,
            numappartamenti: 0,
            consumo: 0,
            gestrem : false,
            contabilizzazione : "",
            sonda : "",
            dispositivi : ""
        },
    }
},

async mounted() {
      let id = this.$route.params.id;
      let response = await axios.get("http://127.0.0.1:8000/api/buildings/"+id);
      this.building = response.data;
  },
methods:{
    async edit(){
          await axios.put("http://127.0.0.1:8000/api/edit/"+ this.building.id, this.building);
          alert("Edificio modificato")
          this.$router.push("/")
          this.reload();
      },
    async reload(){
    let response = await axios.get("http://127.0.0.1:8000/api/buildings");
    this.building = response.data;
    }
},
}
</script>