<template>
  <h1>Edicion de productos</h1>
  <table>
    <tr v-for="producto in productos" :key="producto.id">
      <td>
       
        <input v-model="producto.nombre" type="text" required/>
        <button @click="cambiar(producto.id)">Guardar precio</button>
        
        <input v-model="producto.precio" type="text" required/>
     
         <button @click="cambiar(producto.id)">Guardar precio</button>
        <button @click="deleteProducto(producto.id)">Eliminar</button>
       
        
     </td>
    </tr>
  </table>

  <div class="añadir">
    
    <h2>Añadir Producto</h2>
    <form @submit.prevent="postProducto">
      <div>
       
        <input v-model="newProduct.nombre" type="text" id="nombre" placeholder="Nombre" class="inputAñadir" required />
      </div>
      <div>
      
        <input v-model="newProduct.precio" type="text" id="precio" placeholder="precio"  class="inputAñadir" require/>
      </div>
      <button type="submit">Guardar Producto</button>
    </form>
  </div>


  <table>
      <tr v-for="sabor in sabores" :key="sabor.id">
        <td>
          {{ sabor.nombre }}
          <button @click="deleteSabor(sabor.id)">Eliminar</button>
           </td>
      </tr>
    </table>
  
    <div class="añadir" >
      <h2>Añadir sabor</h2>
      <form @submit.prevent="postSabor">
       <div >
        
          <input v-model="newSabor.nombre" type="text" id="nombre" class="inputAñadir" placeholder="Nombre" required />
        </div>
        <div>
         
          <input v-model="newSabor.descripcion" type="text" id="descripcion"  class="inputAñadir" placeholder="Descripcion" required />
        </div>
        <button type="submit">Guardar sabor</button>
      </form>
    </div>
</template>

<script>



import axios from 'axios';

export default {
  data() {
    return {
      productos: [],
      newProduct: {
        nombre: '',
        precio: '',
      },
      sabores: [],
        newSabor: {
          nombre: '',
          descripcion: '',
        },
    };
  },
  mounted() {
    this.getProductos();
    this.getSabores();
  },
  methods: {
    getProductos() {
      axios
        .get('http://localhost:8000/apiv1/Productos')
        .then((response) => {
          this.productos = response.data;
        })
        .catch((error) => {
          console.error('Error al cargar los productos:', error);
        });
    },
    deleteProducto(id) {
      axios
        .delete(`http://localhost:8000/apiv1/Productos/${id}`)
        .then(() => {
          this.productos = this.productos.filter(
            (producto) => producto.id !== id
          );
        })
        .catch((error) => {
          console.error('Error al eliminar el producto:', error);
        });
    },
    postProducto() {
      axios
        .post('http://localhost:8000/apiv1/Productos/crear', {
          nombre: this.newProduct.nombre,
          precio: this.newProduct.precio,
        })
        .then((response) => {
          this.productos.push(response.data);
          this.newProduct = { nombre: '', precio: '' };
        })
        .catch((error) => {
          console.error('Error al agregar el producto:', error);
        });
    },
    cambiar(id) {
      const producto = this.productos.find((prod) => prod.id === id);

      if (!producto) {
        console.error(`Producto con id ${id} no encontrado.`);
        return;
      }

      axios
        .put(`http://localhost:8000/apiv1/Productos/${id}`, 
          producto
        )
        .then(() => {
        
        })
        .catch((error) => {
          console.error('Error al cambiar el precio:', error);
        });
    },
  
  getSabores() {
        axios
          .get('http://localhost:8000/apiv1/Sabores')
          .then((response) => {
            this.sabores = response.data;
          })
          .catch((error) => {
            console.error('Error al cargar los sabores:', error);
          });
      },
      deleteSabor(id) {
        axios
          .delete(`http://localhost:8000/apiv1/Sabores/${id}`)
          .then(() => {
            this.sabores = this.sabores.filter(
              (sabor) => sabor.id !== id
            );
          })
          .catch((error) => {
            console.error('Error al eliminar el sabor:', error);
          });
      },
      postSabor() {
        axios
          .post('http://localhost:8000/apiv1/Sabores/crear', {
            nombre: this.newSabor.nombre,
            descripcion: this.newSabor.descripcion,
          })
          .then((response) => {
            this.sabores.push(response.data);
            this.newSabor = { nombre: '', descripcion: '' };
          })
          .catch((error) => {
            console.error('Error al agregar el sabor:', error);
          });
      },
      
    }, };
</script>

<style>


button {
    background-color: #26c6da; 
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    margin:10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #00acc1; 
}
.button-group {
    display: flex;             
    flex-direction: column;    
    align-items: flex-start;   
    gap: 10px;               
}





input[type="text"], input[type="string"] {
    display: inline-block;  
    border: 1px solid #00acc1; 
    border-radius: 5px;
    padding: 8px;
    margin: 5px ;
    width: auto; 
    min-width: 50px; 
}

thead {
    background-color: #00acc1; /* Color de fondo del encabezado */
    color: white;              /* Color del texto del encabezado */
}


.añadir{

  width: 100%;
    border-radius: 50px;
    margin: 20px 0;
    border: 1px solid #004d40; 
    border-radius: 50px;
    padding: 1px;
    text-align: center;
    background-color: #b2ebf2;


    .inputAñadir{
      width: 300px;
    }
}
button {
    background-color: #26c6da; 
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    margin:10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #00acc1; 
}
.button-group {
    display: flex;             
    flex-direction: column;    
    align-items: flex-start;   
    gap: 10px;               
}





input[type="text"], input[type="string"] {
    display: inline-block;  
    border: 1px solid #00acc1; 
    border-radius: 5px;
    padding: 8px;
    margin: 5px ;
    width: auto; 
    min-width: 50px; 
}

thead {
    background-color: #00acc1; /* Color de fondo del encabezado */
    color: white;              /* Color del texto del encabezado */
}


.añadir{

  width: 100%;
    border-radius: 50px;
    margin: 20px 0;
    border: 1px solid #004d40; 
    border-radius: 50px;
    padding: 1px;
    text-align: center;
    background-color: #b2ebf2;


    .inputAñadir{
      width: 300px;
    }
}
</style>
