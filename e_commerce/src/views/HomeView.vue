<template>
  <v-app theme="dark">
    <v-main>
      <v-container>
        <h1 id="title">Produtos</h1>
        <v-row>
          <v-col v-col v-for="(produto, index) in produtos" :key="index"  cols="12" sm="6" md="4" lg="3" xl="2">
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

              <v-card-text style="text-align: center;">
                {{ produto.nameCategoria }}
              </v-card-text>

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
                     R$ {{produto.preco}}
                    </v-btn>
                  </template>
                </v-dialog>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const produtos = ref([]);

const fetchProdutos = async () => {
  try {
    const response = await fetch('http://localhost:8080/listAllProduct');
    const data = await response.json();
    console.log(data)
    if (data.sucess) {
      produtos.value = data.produtos;
    } else {
      console.error('Erro ao buscar os produtos:', data.error);
    }
  } catch (error) {
    console.error('Erro ao buscar os produtos:', error);
  }
};

onMounted(() => {
  fetchProdutos();
});


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
