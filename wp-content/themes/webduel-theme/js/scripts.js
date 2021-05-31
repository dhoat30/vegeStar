import '../style.css';
let $ = jQuery;
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';


import Overlay from './modules/overlay';
import ProductSlider from './modules/ProductSlider';
import ReviewSlider from './modules/ReviewSlider';
import PopUpCart from './modules/PopUpCart';
import SearchTrigger from './modules/SearchTrigger';
// trade directory

// footer 

window.onload = function () {
  //add to cart animation- show cart option on hover
  //review slider
  const reviewSlider = new ReviewSlider();
  //account 
  const productSlider = new ProductSlider();
  const overlay = new Overlay();

  const popUpCart = new PopUpCart();
  const searchTrigger = new SearchTrigger();

  //Tool tip 


  //profile navbar
  let profileNavbar = {
    eventListener: function () {
      $('.profile-name-value').click(function (e) {
        let user = document.querySelector('.profile-name-value').innerHTML;

        if (user.includes('LOGIN / REGISTER')) {
          console.log('Log In');
        }
        else {
          e.preventDefault();
          $('.header .login-area nav').slideToggle(200, function () {
            $('.arrow-icon').toggleClass('fa-chevron-up');
          });
        }
      })
    }
  }

  profileNavbar.eventListener();
}

// ajax log in
jQuery(document).ready(function ($) {

  // Show the login dialog box on click
  $('a#show_login').on('click', function (e) {
    $('body').prepend('<div class="login_overlay"></div>');
    $('form#login').fadeIn(500);
    $('div.login_overlay, form#login a.close').on('click', function () {
      $('div.login_overlay').remove();
      $('form#login').hide();
    });
    e.preventDefault();
  });

  // Perform AJAX login on form submit
  $('form#login').on('submit', function (e) {
    $('form#login p.status').show().text(ajax_login_object.loadingmessage);
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: ajax_login_object.ajaxurl,
      data: {
        'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
        'username': $('form#login #username').val(),
        'password': $('form#login #password').val(),
        'security': $('form#login #security').val()
      },
      success: function (data) {
        $('form#login p.status').text(data.message);
        if (data.loggedin == true) {
          document.location.href = ajax_login_object.redirecturl;
        }
      }
    });
    e.preventDefault();
  });

});