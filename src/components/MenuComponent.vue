

<template>
  <nav class="menu">
    <router-link class="nav-link" to="/inicio">marca</router-link>
    <router-link class="nav-link" to="/productos">Productos y sabores</router-link>
    <router-link class="nav-link" to="/nosotros">Sobre nosotros</router-link>
  </nav>
</template>

<style>
.menu {
    display: flex;               
    justify-content: center; 
    background-color: #00acc1;   
  border-radius: 100px;
    padding: 15px;  
    width:100%;
          margin-bottom: 50px;       
}

.nav-link {
    color: #ffffff;              
    text-decoration: none;       
    padding: 10px 15px;          
    border-radius: 5px;          
    transition: background-color 0.3s ease; 
}

.nav-link:hover {
    background-color: #26c6da;   
    border-radius: 50px;
}


body {
    background-color: #e0f7fa; 
    color: #006064; 
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1, h2, h3 {
    color: #004d40; 
    text-align: center;
    margin-bottom: 20px;
}




table {
    width: 100%;
    border-radius: 50px;
    margin: 20px 0;
}

td, th {
    border: 1px solid #004d40; 
    border-radius: 50px;
    padding: 20px;
    text-align: center;
}

tr:nth-child(even) {
    background-color: #b2ebf2; 
}

</style>
