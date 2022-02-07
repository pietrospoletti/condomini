<template>
    <div class='flex flex-col items-center'>
        <!--<div v-for="(offer, index) in offer" :key="index">-->
                <div  class="flex flex-row m-5 mr-2 items-center justify-center">
                    <img :src="building.foto" alt="foto edificio" class="flex w-72 h-72 mr-10" />
                    <div class="flex flex-col text-black text-center h-full w-full">
                        <div class="flex mb-1">{{ building.nome }} </div>
                        <div class="flex mb-1">{{ building.comune }} </div>
                        <div class="flex mb-1">{{ building.provincia }} </div>
                        <div class="flex mb-1">{{ building.indirizzo }} </div>
                        <div class="flex mb-1">{{ building.cap }} </div>
                        <div class="flex mb-1">{{ building.numappartamenti }} </div>
                        <div class="flex mb-1">{{ building.consumo }} </div>
                        <div class="flex mb-1">{{ building.gestrem }} </div>
                        <div class="flex mb-1">{{ building.contabilizzazione }} </div>
                        <div class="flex mb-1">{{ building.sonda }} </div>
                        <div class="flex mb-1">{{ building.dispositivi }} </div>
                    </div>
                </div>
            <!--</div>-->
    </div>
</template>


<script>
import axios from "axios";
export default {
    name: "BuildingDetail",
    data() {
    return {
      building: null,
    };
  },

  async mounted() {
      this.id = this.$route.params.id;
      let response = await axios.get("http://127.0.0.1:8000/api/buildings/"+this.id);
      this.building = response.data;
  },
}

</script>