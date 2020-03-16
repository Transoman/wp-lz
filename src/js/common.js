'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask'),
  matchHeight = require('jquery-match-height-browserify'),
  SimpleBar = require('simplebar');

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

  let videoPP = function(video, btn) {
    if (video) {

      let target = $(video).parent();

      setTimeout(function() {
        $('body, html').animate({
          scrollTop: target.offset().top - 20
        }, 1000);
      }, 200);

      if (video.paused) {
        $('.btn-play').removeClass('active');
        $('.float-video video').each(function() {
          if (!$(this)[0].paused) {
            $(this)[0].pause();
            $(this).parent().removeClass('play');
            $(this).parent().fadeOut();
          }
        });

        video.play();
        $(video).parent().addClass('play');
        $(video).parent().fadeIn();
        btn.addClass('active');
      } else {
        $('.btn-play').removeClass('active');
        $('.float-video video').each(function() {
          if (!$(this)[0].paused) {
            $(this)[0].pause();
            $(this).parent().removeClass('play');
            $(this).parent().fadeOut();
          }
        });

        video.pause();
        $(video).parent().removeClass('play');
        $(video).parent().fadeOut();
        btn.removeClass('active');
      }

      video.addEventListener('ended', function () {
        $('.btn-play').removeClass('active');
        $('.float-video video').each(function() {
          $(this).parent().removeClass('play');
          $(this).parent().fadeOut();
        });
      }, false);
    }
  };

  let videoPlayAbout = function() {
    let btn = $('.about-list .btn-play');

    btn.click(function(e) {
      e.preventDefault();

      let video = $(this).parent().find('.float-video video')[0];

      videoPP(video, $(this));
    });
  };

  let closeVideo = function() {
    let btnClose = $('.float-video__close');

    btnClose.click(function (e) {
      e.preventDefault();

      $('.btn-play').removeClass('active');
      $('.float-video video').each(function() {
        if (!$(this)[0].paused) {
          $(this)[0].pause();
          $(this).parent().removeClass('play');
          $(this).parent().fadeOut();
        }
      });
    })
  };

  let videoPlayWhy = function() {
    let btn = $('.why-list .btn-play');
    let btnClose = $('.why-list .float-video__close');

    btn.click(function(e) {
      e.preventDefault();

      $(this).parent().parent().toggleClass('why-list__item--video-play');

      let video = $(this).parent().find('.float-video video')[0];

      videoPP(video, $(this));

      video.addEventListener('ended', function () {
        btn.parent().parent().removeClass('why-list__item--video-play');
      }, false);
    });

    btnClose.click(function () {
      btn.parent().parent().removeClass('why-list__item--video-play');
    });
  };

  let videoPlayFaq = function() {
    let btn = $('.faq-list .btn-play');

    btn.click(function(e) {
      e.preventDefault();

      let video = $(this).parent().find('.float-video video')[0];

      videoPP(video, $(this));
    });
  };

  let showDescr = function() {
    let btn = $('.btn-text');
    let btnClose = $('.float-descr__close');

    btn.click(function(e) {
      e.preventDefault();

      if ($(this).next('.float-descr').is(':visible')) {
        btn.removeClass('active');
        $('.float-descr').fadeOut();
        return;
      }

      btn.removeClass('active');
      $('.float-descr').fadeOut();
      $(this).next('.float-descr').fadeIn();
      $(this).addClass('active');

      let target = $(this).next('.float-descr');

      setTimeout(function() {
        $('body, html').animate({
          scrollTop: target.offset().top - 20
        }, 1000);
      }, 200);

    });

    btnClose.click(function (e) {
      e.preventDefault();
      $(this).parent().fadeOut();
      btn.removeClass('active');
    });
  };

  let showDescrWhy = function() {
    let btn = $('.btn-text');
    let btnClose = $('.float-descr__close');

    btn.click(function() {
      $('.why-list__item').removeClass('active');
      $(this).parent().parent().addClass('active');
    });

    btnClose.click(function() {
      $('.why-list__item').removeClass('active');
    });
  };

  $('.price-list__row:not(:first-child)').matchHeight({
    byRow: false
  });

  toggleNav();
  initModal();
  inputMask();
  videoPlayAbout();
  videoPlayWhy();
  videoPlayFaq();
  showDescr();
  showDescrWhy();
  closeVideo();

  // SVG
  svg4everybody({});
});