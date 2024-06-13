<template>
    <nav>
     <router-link to="/" id="logo_position">
       <img src="./../assets/bolsa.png" alt="Imagem_logo" id="logo_url">
     </router-link>
     <router-link to="/">Produtos</router-link>
    </nav>
</template>

<script>
export default {
  name: 'NavBar'
}
</script>

<style scoped>
  nav{
    padding: 15px 20px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    background-color: #E53935;
  }

  #logo_url{
    height: 70px;
    width: 100px;
  }

  #logo_position {
    margin: auto;
    margin-left: 0;
  }

  nav a {
    color: #ffc935;
    text-decoration: none;
    margin: 12px;
    transition: 0.5s;

  }

  nav a:hover {
    color: #FFF;
  }


</style>