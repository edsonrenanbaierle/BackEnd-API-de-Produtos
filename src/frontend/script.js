// URL da API
const apiUrl = 'http://localhost:8080/listAllProduct';

// Função para buscar os produtos da API
async function fetchProducts() {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        return data.data;
    } catch (error) {
        console.error('Erro ao buscar os produtos:', error);
        return [];
    }
}

// Função para exibir os produtos na página
async function renderProducts() {
    const productsContainer = document.getElementById('product-container');
    const products = await fetchProducts();

    // Limpar o container antes de adicionar os produtos
    productsContainer.innerHTML = '';

    // Adicionar cada produto ao container
    products.forEach(product => {
        const productElement = document.createElement('div');
        productElement.classList.add('product');

        // Montar o HTML do produto
        productElement.innerHTML = `
            <img src="${product.pathImagem}" alt="${product.titulo}">
            <div class="product-info">
                <h2 class="product-title">${product.titulo}</h2>
                <p class="product-description">${product.descricao}</p>
                <p class="product-price">Preço: R$ ${product.preco / 100}</p>
            </div>
        `;

        // Adicionar o produto ao container
        productsContainer.appendChild(productElement);
    });
}

// Chamar a função para exibir os produtos ao carregar a página
window.addEventListener('load', renderProducts);
