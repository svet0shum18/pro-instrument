document.addEventListener("DOMContentLoaded", () => {
    const dropdownToggle = document.querySelector(".dropdown-catalog");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    // Открыть/закрыть меню при клике
    dropdownToggle.addEventListener("mouseenter", () => {
        dropdownMenu.classList.toggle("show");
    });

    // Закрыть меню при выборе элемента
    dropdownMenu.addEventListener("mouseleave", (event) => {
        // if (event.target.classList.contains("dropdown-item")) {
        dropdownMenu.classList.remove("show"); // Скрыть меню

    });
});

$(document).ready(function() {

    // Обработчик клика на кнопку "в корзину"
    $('.add-to-cart').on('click', function() {
        var productId = $(this).data('product-id');
        var quantity = 1;  // Или сколько товара добавляется

        // AJAX запрос для добавления товара в корзину
        $('.add-to-cart').click(function () {
            const productId = $(this).data('id');
            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.success);
                },
                error: function () {
                    alert('Error adding product to cart.');
                }
            });
        });

    });
});

// Функция для обновления отображения корзины
function updateCart(cart) {
    let cartContent = $('#cart-content');  // Элемент для вывода корзины
    cartContent.empty();  // Очищаем корзину перед обновлением

    // Перебор товаров в корзине
    $.each(cart, function(id, item) {
        cartContent.append(`
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}">
                <p>${item.name}</p>
                <p>Количество: ${item.quantity}</p>
                <p>${item.price} ₽</p>
            </div>
        `);
    });

    // Обновляем количество товаров в корзине
    $('#cart-count').text(Object.keys(cart).length);
}


// Функция для обновления отображения корзины
function updateCart(cart) {
    let cartContent = $('#cart-content');
    cartContent.empty();  // Очистить содержимое корзины

    $.each(cart, function(id, item) {
        cartContent.append(`
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}">
                <p>${item.name}</p>
                <p>Количество: ${item.quantity}</p>
                <p>${item.price} ₽</p>
            </div>
        `);
    });

    // Обновляем количество товаров в корзине
    $('#cart-count').text(Object.keys(cart).length);
}
