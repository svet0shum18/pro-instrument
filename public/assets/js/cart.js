// document.addEventListener("DOMContentLoaded", function () {
// 	document.querySelectorAll("#add-to-cart-btn").forEach(button => {
// 			button.addEventListener("click", function () {
// 					let productId = this.dataset.id;
					
// 					fetch('/cart/add', {
// 							method: 'POST',
// 							headers: {
// 									'Content-Type': 'application/json',
// 									'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
// 							},
// 							body: JSON.stringify({ product_id: productId })
// 					})
// 					.then(response => response.json())
// 					.then(data => alert(data.message))
// 					.catch(error => console.error('Ошибка:', error));
// 			});
// 	});
// });


document.addEventListener('DOMContentLoaded', function () {
	// Находим все кнопки "В корзину"
	const addToCartButtons = document.querySelectorAll('#add-to-cart-btn');
	
	addToCartButtons.forEach(button => {
			button.addEventListener('click', function(event) {
					// Получаем id товара
					const productId = event.target.getAttribute('data-id');
					console.log(`Товар с id ${productId} добавлен в корзину`);
					
					// Отправляем запрос на сервер или выполняем другие действия
					// Пример отправки данных в Laravel (в cart.js или в другом месте)
					addToCart(productId);
			});
	});
});

function addToCart(productId) {
	// Пример отправки запроса в Laravel через AJAX:


	fetch('/add-to-cart', {
			method: 'POST',
			headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			},
			body: JSON.stringify({ product_id: productId })
	})
	.then(response => response.json())
	.then(data => {
			if (data.success) {
					alert('Товар добавлен в корзину!');
					updateCartView(data.cart); // Обновление отображения корзины
			} else {
					alert('Ошибка при добавлении товара в корзину');
			}
	})
	.catch(error => {
			console.error('Ошибка:', error);
	});
}

function updateCartView(cart) {
	
	const cartContainer = document.getElementById('cart-container');

	// Очистка старого содержимого
	cartContainer.innerHTML = '';

	// Добавление каждого товара из корзины в HTML
	cart.forEach(item => {
			const productElement = document.createElement('div');
			productElement.classList.add('cart-item');
			productElement.innerHTML = `
					<p>Товар: ${item.product.name}</p>
					<p>Цена: ${item.product.price}</p>
					<p>Количество: ${item.quantity}</p>
			`;
			cartContainer.appendChild(productElement);
			cartContainer.innerHTML = cartTable;

	});
}
