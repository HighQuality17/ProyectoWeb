document.getElementById('btn-plus').addEventListener('click', function() {
    let quantity = parseInt(document.getElementById('var-value').innerText);
    quantity++;
    document.getElementById('var-value').innerText = quantity;
    document.getElementById('hidden-quantity').value = quantity;
});

document.getElementById('btn-minus').addEventListener('click', function() {
    let quantity = parseInt(document.getElementById('var-value').innerText);
    if (quantity > 1) {
        quantity--;
        document.getElementById('var-value').innerText = quantity;
        document.getElementById('hidden-quantity').value = quantity;
    }
});
