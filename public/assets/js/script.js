/*!
 * Start Bootstrap - SB Admin 2 v4.1.3 (https://startbootstrap.com/theme/sb-admin-2)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin-2/blob/master/LICENSE)
 */

!function (l) { "use strict"; l("#sidebarToggle, #sidebarToggleTop").on("click", function (e) { l("body").toggleClass("sidebar-toggled"), l(".sidebar").toggleClass("toggled"), l(".sidebar").hasClass("toggled") && l(".sidebar .collapse").collapse("hide") }), l(window).resize(function () { l(window).width() < 768 && l(".sidebar .collapse").collapse("hide"), l(window).width() < 480 && !l(".sidebar").hasClass("toggled") && (l("body").addClass("sidebar-toggled"), l(".sidebar").addClass("toggled"), l(".sidebar .collapse").collapse("hide")) }), l("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (e) { var o; 768 < l(window).width() && (o = (o = e.originalEvent).wheelDelta || -o.detail, this.scrollTop += 30 * (o < 0 ? 1 : -1), e.preventDefault()) }), l(document).on("scroll", function () { 100 < l(this).scrollTop() ? l(".scroll-to-top").fadeIn() : l(".scroll-to-top").fadeOut() }), l(document).on("click", "a.scroll-to-top", function (e) { var o = l(this); l("html, body").stop().animate({ scrollTop: l(o.attr("href")).offset().top }, 1e3, "easeInOutExpo"), e.preventDefault() }) }(jQuery);

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();
    $('#id_pasien').select2();
    $('#id_tenaga_medis').select2();
});

// Preview Image
function previewImage() {
    const inputFileUserImg = document.querySelector('#user_img');
    const label = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    const inputFile = inputFileUserImg;

    if (inputFile) {
        label.textContent = inputFile.files[0].name;
        const fileReader = new FileReader();
        fileReader.readAsDataURL(inputFile.files[0]);

        fileReader.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    } else {
        alert('ID Not Found');
    }
}