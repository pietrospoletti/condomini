import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import BuildingsList from '@/components/BuildingsList.vue';
import NewBuilding from '@/components/NewBuilding.vue';
import BuildingDetail from '@/components/BuildingDetail.vue';
import EditBuilding from '@/components/EditBuilding.vue';

Vue.config.productionTip = false

Vue.use (VueRouter); 

const routes = [
  {
    path: "/",
    name: "buildings_list",
    component: BuildingsList,
  },
  {
    path: "/newbuilding",
    name: "new_building",
    component: NewBuilding,
  },
  {
    path: "/buildingdetail/:id",
    name: "building_detail",
    component: BuildingDetail,
  },
  {
    path: "/edit/:id",
    name: "edit_building",
    component: EditBuilding,
  },
];

const router= new VueRouter({
mode: "history",
routes,
});

new Vue({
render: h => h(App),
router,
}).$mount('#app')
