'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.header__nav');
    let header = $('.header');

    toggle.on('click', function (e) {
      e.preventDefault();
      $(this).toggleClass('active');
      header.toggleClass('nav-open');
      nav.toggleClass('open');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      scrolllock: true,
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  // Input mask
  let inputMask = function() {
    let phoneInputs = $('input[type="tel"]');
    let maskOptions = {
      mask: '+{7} (000) 000-0000'
    };

    if (phoneInputs) {
      phoneInputs.each(function(i, el) {
        IMask(el, maskOptions);
      });
    }
  };

  $('.about-list__item, .faq-list__item').mouseenter(function () {
    $(this).find('.btn-play').addClass('btn-hover');
  });

  $('.about-list__item, .faq-list__item').mouseleave(function () {
    $(this).find('.btn-play').removeClass('btn-hover');
  });

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();

          let nav = $('nav');
          let toggle = $('.nav-toggle');
          let header = $('.header');

          nav.removeClass('open');
          toggle.removeClass('active');
          header.removeClass('nav-open');

          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
        }
      }
    });


  toggleNav();
  initModal();
  inputMask();

  // SVG
  svg4everybody({});
});