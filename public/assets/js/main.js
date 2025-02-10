document.addEventListener("DOMContentLoaded", () => {
    const dropdownToggle = document.querySelector(".btn-catalog");
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

// $(document).ready(function() {
//     // Обработчик открытия модального окна корзины
//     $('#open-cart-btn').on('click', function() {
//         // Загружаем данные корзины через AJAX
//         $.ajax({
//             url: '/cart', // Маршрут для получения данных корзины
//             method: 'GET',
//             success: function(response) {
//                 // Вставляем полученные данные в модальное окно
//                 $('#cart-modal-body').html(response);
//             },
//             error: function() {
//                 $('#cart-modal-body').html('<p>Ошибка загрузки корзины.</p>');
//             }
//         });
//     });

//     // Обработчик оформления заказа
//     $('#checkout-btn').on('click', function() {
//         $.ajax({
//             url: '/cart/checkout', // Маршрут для оформления заказа
//             method: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function(response) {
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Заказ успешно оформлен!',
//                     showConfirmButton: false,
//                     timer: 1500
//                 }).then(() => {
//                     location.reload(); // Перезагружаем страницу
//                 });
//             },
//             error: function() {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Ошибка оформления заказа',
//                     text: 'Попробуйте еще раз.'
//                 });
//             }
//         });
//     });
// });


