<template>
    <div>
        <div v-for="(building, index) in building" :key="index">
            <div  class="flex w-full h-auto mb-12 p-0 grid grid-cols-10">
                <img :src="building.foto" alt="foto edificio" class="w-20 h-20 mb-2 grow col-start-4 col-end-5" />
                <div class="flex flex-col text-black h-full w-full ml-0 col-start-5">
                    <div class="flex mb-1">{{ building.nome}} </div>
                    <div class="flex mb-1">{{ building.comune}} </div>
                    <div class='flex flex-row top-0 right-0'>
                      <button @click="edit(building)" class='flex flex-row bg-yellow-500 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1'>Modifica dettagli edificio</button>
                      <button @click="details(building)" class='flex flex-row bg-blue-100 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1'>Dettagli edificio</button>
                      <button @click="elimina(building.id)" class="flex flex-row bg-red-500 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1">Elimina edificio</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "BuildingsList",
    data() {
    return {
      building: [],
    };
  },

  async mounted() {
    this.reload();
  },

methods: {
    edit(building){
        this.$router.push("edit/"+ building.id)
      },
    details(building) {
        this.$router.push('buildingdetail/'+ building.id)
    },
    async elimina(id){
        await axios.delete("http://127.0.0.1:8000/api/delete/"+id);
        alert("Edificio eliminato") 
        this.reload();
    },
    async reload(){
      let response = await axios.get("http://127.0.0.1:8000/api/buildings");
    this.building = response.data;
  },
}
}

</script>