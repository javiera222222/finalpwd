

<style>
/* Estilos necesarios */

</style>

<template>
    <tr  v-for="producto, i in productos" :key="producto.id">

    <td>{{ producto.nombre }}</td>
    <td>${{ producto.precio }}</td>
    

   </tr>
   <tr  v-for="sabor, i in sabores" :key="sabor.id">

<td>{{ sabor.nombre }}</td>
<td>{{ sabor.descripcion }}</td>

</tr>
   
     </template>


export default{
  data(){
    return{ sabores:null }},
    mounted(){
      this.getSabores();
    
    },
    methods:{
      getSabores(){
        axios.get('http://localhost:8000/apiv1/Sabores').then(
          response => (
            this.sabores=response.data
          )
        )
      }
    }
  }

     
     <script >
     import axios from 'axios';
     export default{
      data(){
        return{ productos:null,
            sabores:null
         }},
        mounted(){
          this.getProductos();
          this.getSabores();
          
        },
        methods:{
          getProductos(){
            axios.get('http://localhost:8000/apiv1/Productos').then(
              response => (
                this.productos=response.data
              )
            )
          },
          getSabores(){
        axios.get('http://localhost:8000/apiv1/Sabores').then(
          response => (
            this.sabores=response.data
          )
        )
      }
        
      }}
     
     </script>
     
     <style>
     /* Estilos necesarios */
     </style>