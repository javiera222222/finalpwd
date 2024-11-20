<template>
  <main>
    <form @submit.prevent="login">
      <h2>Acceso de usuarios</h2>

      <div class="input-group">
        <label for="username">Nombre de usuario</label>
        <input
          type="text"
          id="username"
          v-model="username"
          placeholder="Ingresa tu nombre de usuario"
        />
      </div>

      <div class="input-group">
        <label for="password">Contraseña</label>
        <input
          :type="typePassword"
          id="password"
          v-model="password"
          placeholder="Ingresa tu contraseña"
        />
        <button type="button" @click="showPassword">{{ icon_append_password }}</button>
      </div>

      <button type="submit" class="login-btn">Ingresar</button>
    </form>

    <div v-if="snackbar" class="snackbar">{{ text }}</div>
  </main>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from 'axios';

const router = useRouter();
const username = ref("");
const password = ref("");
const snackbar = ref(false);
const text = ref("");

const typePassword = ref("password");
const icon_append_password = ref("Mostrar");

const showPassword = () => {
  if (typePassword.value === "password") {
    typePassword.value = "text";
    icon_append_password.value = "Ocultar";
  } else {
    typePassword.value = "password";
    icon_append_password.value = "Mostrar";
  }
};

const login = async () => {
  if (username.value && password.value) {
    try {
      const response = await axios.post("http://localhost:8000/apiv1/users/check-username/" + username.value, {
        password: password.value,
      });

      // Suponiendo que el API retorna un código de estado
      if (response.data && response.data.code === 200) {
        router.push("/");
      } else {
        snackbar.value = true;
        text.value = "Error: Credenciales incorrectas";
      }
    } catch (error) {
      snackbar.value = true;
      text.value = "Error: Usuario o contraseña incorrecta";
    }
  } else {
    snackbar.value = true;
    text.value = "Error: Los campos deben estar completos";
  }
};
</script>

<style>
main {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #f9f9f9;
}

h2 {
  text-align: center;
}

.input-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.snackbar {
  margin-top: 15px;
  padding: 10px;
  background-color: #f44336;
  color: white;
  text-align: center;
  border-radius: 4px;
}
</style>
