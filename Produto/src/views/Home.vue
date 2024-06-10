<template>
  <v-app theme="dark">
    <v-main>
      <v-container>
        <h1 id="title">Produtos</h1>
        <v-row>
          <v-col v-for="(produto, index) in produtos" :key="index"  cols="12" sm="6" md="4" lg="3" xl="2">
            <v-card
              id="card"
              class="mx-auto"
              max-width="300"
            >
              <v-img
                :src="produto.pathImagem"
                height="200px"
                class="ma-4"
                cover
              ></v-img>

              <v-card-title style="text-align: center;">
                {{ produto.titulo }}
              </v-card-title>

              <v-card-actions>
                <v-dialog width="300px">
                  <template #activator="{ props }">
                    <v-btn
                      location="center"
                      color="light-blue-darken-4"
                      variant="outlined"
                      class="mt-4"
                      v-bind="props"
                    >
                      Detalhes
                    </v-btn>
                  </template>
                  <!-- componente -->
                  <Modalpoke :produto="produto" :index="produto.idProduto" />
                </v-dialog>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>


<script>
import Modalpoke from '@/components/Modalpoke.vue';
export default {
  name: 'Home',
  data: () => ({
    produtos: []
  }),
  methods: {
    async fetchProdutos() {
      try {
        const response = await fetch('http://localhost:8080/listAllProduct');
        const data = await response.json();
        if (data.sucess) {
          this.produtos = data.data;
        } else {
          console.error('Erro ao buscar os produtos:', data.error);
        }
      } catch (error) {
        console.error('Erro ao buscar os produtos:', error);
      }
    }
  },
  mounted() {
    this.fetchProdutos();
  },
  components: {
    Modalpoke
  }
}
</script>

<style scoped>
  #title {
    text-align: center;
    margin-bottom: 20px;
  }

  #card{
    border: 2px solid #121212;
  }
</style>
