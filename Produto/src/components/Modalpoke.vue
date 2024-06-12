<template>
  <v-card height="350px" width="400px" style="display: flex; align-items: center;">
    <div id="c">
      <h2>{{ produto.titulo }}</h2>
      <v-img
        :src="produto.pathImagem"
        height="200px"
      ></v-img>
      <div class="number_container">
        <h3>Preço:</h3>
        <p>R$ {{ produto.preco }}</p>
      </div>
      <div class="data_container">
        <div>
          <h4 class="title_container_height">Estoque:</h4>
          <p>{{ produto.estoque }}</p>
        </div>
        <div>
          <h4 class="title_container_weight">Categoria:</h4>
          <p>{{ produto.nameCategoria }}</p>
        </div>
      </div>
    </div>
  </v-card>
</template>

<script>
export default {
  name: 'Modalpoke',
  data() {
    return {
      produto: {}
    }
  },
  props: {
    index: Number
  },
  methods: {
    async getProdutoEspecifico() {
      try {
        console.log(this.index)
        const response = await fetch(`http://localhost:8080/product/${this.index}`);
        const data = await response.json();
        if (data.sucess) {
          this.produto = data.data;
        } else {
          console.error('Erro ao buscar o produto:', data.error);
        }
      } catch (error) {
        console.error('Erro ao buscar o produto:', error);
      }
    }
  },
  mounted() {
    this.getProdutoEspecifico();
  }
}
</script>

<style scoped>
  h2, h3, h4 {
    color: gold;
    text-align: center;
  }

  .number_container {
    display: flex;
    flex-direction: column;
    text-align: center;
  }

  .data_container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 0.5rem;
  }

  .data_container > div {
    display: flex;
    margin-right: 0.5rem;
    padding: 0 0.2rem;
  }

  .title_container_weight,
  .title_container_height {
    padding-right: 0.4rem;
  }
</style>
