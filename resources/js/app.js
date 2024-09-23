import './bootstrap';

// public/js/app.js
function fetchProducts() {
    fetch('http://127.0.0.1:8000/api/products')
        .then(response => response.json())
        .then(data => {
            const productsDiv = document.getElementById('products');
            productsDiv.innerHTML = '';
            data.forEach(product => {
                productsDiv.innerHTML += `<p>${product.name} - $${product.price}</p>`;
            });
        })
        .catch(error => console.error('Error:', error));
}

