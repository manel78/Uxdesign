let offset = 0;  // chargés
const limit = 10;
async function fetchProducts() {
    const response = await fetch(`fetch_products.php?limit=${limit}&offset=${offset}`);
    const products = await response.json();

    const productList = document.getElementById('product-list');
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${product.image_url}" alt="${product.name}">
            <div>
                <h2>${product.name}</h2>
                <p>${product.description}</p>
                <p>Prix : ${product.price}€</p>
            </div>
        `;
        productList.appendChild(productDiv);
    });

    offset += limit;
    if (products.length < limit) {
        document.getElementById('load-more').style.display = 'none';
    }
}
document.getElementById('load-more').addEventListener('click', fetchProducts);
fetchProducts();
