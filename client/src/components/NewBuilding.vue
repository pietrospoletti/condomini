<template>
<div class="h-screen flex flex-col items-center w-auto">
    <div class="flex flex-col mb-3" v-for="field in fields" :key="field.code">
        <label class="mb-2 font-bold text-red-900" :for="field.code"> {{ field.label }} </label>
        <input v-if="field.type == 'text'" class="border border-gray-200 p-2 rounded" type="text" :id="field.code" v-model="newBuilding[field.code]"/>
        <input v-if="field.type == 'number'" class="border border-gray-200 p-2 rounded" type="number" :id="field.code" v-model="newBuilding[field.code]"/>
        <select v-if="field.type == 'select'" class="border border-gray-200 p-2 rounded" :name="field.code" :id="field.code" v-model="newBuilding[field.code]" >
        <option v-for="option in field.options" :key="option.code" :value="option.code" >{{ option.label }} </option></select>
        <input v-if="field.type == 'boolean'" class="border border-gray-200 p-2 rounded" type="checkbox" :id="field.code" v-model="newBuilding[field.code]"/>

    </div>
    <button class='flex flex-row bg-green-200 pr-5 pl-5 pt-2 pb-2 rounded-lg mt-2' @click="conferma()" :disabled="!formIsValid">Aggiungi edificio</button>
</div>
</template>


<script>
import axios from 'axios';
export default {
    name:"NewBuilding",
    data(){
    return {
        fields: [
        {
          label: "nome",
          code: "nome",
          type: "text",
        },
        {
          label: "foto",
          code: "foto",
          type: "text",
        },
        {
          label: "comune",
          code: "comune",
          type: "text",
        },
        {
          label: "provincia",
          code: "provincia",
          type: "text",
        },
        {
          label: "indirizzo",
          code: "indirizzo",
          type: "text",
        },
        {
          label: "cap",
          code: "cap",
          type: "number",
        },
        {
          label: "numappartamenti",
          code: "numappartamenti",
          type: "number",
        },
        {
          label: "consumo",
          code: "consumo",
          type: "number",
        },
        {
          label: "gestrem",
          code: "gestrem",
          type: "boolean",
        },

        {
          label: "contabilizzazione",
          code: "contabilizzazione",
          type: "select",
          options: [
            {
              label: "Diretta",
              code: "dir",
            },
            {
              label: "Indiretta",
              code: "ind",
            },
          ],
        },
        {
          label: "sonda",
          code: "sonda",
          type: "select",
          options: [
            {
              label: "Compatta",
              code: "comp",
            },
            {
              label: "Remota",
              code: "rem",
            },
          ],
        },
        {
          label: "dispositivi",
          code: "dispositivi",
          type: "select",
          options: [
            {
              label: "Ripartitori di calore",
              code: "rdc",
            },
            {
              label: "Totalizzatore di calore",
              code: "tdc",
            },
            {
              label: "Contatore di energia termica",
              code: "cdet",
            },
          ],
        },
        
        ],
    newBuilding:{
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
    };
},
methods:{
    async conferma(){
        console.log(this.newBuilding);
        let response = await axios.post("http://127.0.0.1:8000/api/addbuilding", this.newBuilding);
        console.log(response);
        alert("Edificio inserito")
        this.reload();
    },
},
computed: {
    formIsValid() {
      return (
        this.newBuilding.nome != "" &&
        this.newBuilding.foto != "" &&
        this.newBuilding.comune > "" &&
        this.newBuilding.provincia != "" &&
        this.newBuilding.indirizzo != "" &&
        this.newBuilding.cap != 0 &&
        this.newBuilding.numappartamenti != 0 &&
        this.newBuilding.consumo != 0 &&
        this.newBuilding.gestrem != false &&
        this.newBuilding.contabilizzazione != "" &&
        this.newBuilding.sonda != "" &&
        this.newBuilding.dispositivi != "" 
      );
    },
  },
}
</script>

<style>
  input{
      border: 1px solid black;
      border-radius: 1rem;
      margin: 3px;
      padding-left: 5px;
  }
</style>