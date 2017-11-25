<!-- Scripts -->
<div>
  <!-- JS Global Compulsory -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/tether/tether.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

  <!-- JS Implementing Plugins -->
  <script src="{{ asset('assets/vendor/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
  <script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
  <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/appear.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.filer/js/jquery.filer.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chosen/chosen.jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/image-select/src/ImageSelect.jquery.js') }}"></script>


  <!-- JS Revolution Slider -->
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js') }}"></script>

  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

  <!-- JS Unify -->
  <script src="{{ asset('assets/js/hs.core.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
  <script src="{{ asset('assets/js/helpers/hs.hamburgers.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.dropdown.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.scrollbar.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.countdown.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.count-qty.js') }}"></script>
  <script src="{{ asset('assets/js/helpers/hs.focus-state.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.file-attachement.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.select.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.step-form.js') }}"></script>
  <script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>





  <!-- JS Customization -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- JS Plugins Init. -->
  <script>
      $(document).on('ready', function () {
          // initialization of carousel
          $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

          $('#carouselCus1').slick('setOption', 'responsive', [{
              breakpoint: 1200,
              settings: {
                  slidesToShow: 4
              }
          }, {
              breakpoint: 992,
              settings: {
                  slidesToShow: 3
              }
          }, {
              breakpoint: 768,
              settings: {
                  slidesToShow: 2
              }
          }], true);
      });

      // initialization of custom select
      $.HSCore.components.HSSelect.init('.js-custom-select');

      // initialization of step form
      $.HSCore.components.HSStepForm.init('.js-step-form');

      // Bootstrap tooltip
      $(function () {
          $('[data-toggle="tooltip"]').tooltip()
      })
      // initialization of header
      $.HSCore.components.HSHeader.init($('#js-header'));
      $.HSCore.helpers.HSHamburgers.init('.hamburger');

      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
      });

      // initialization of HSDropdown component
      $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
          afterOpen: function () {
              $(this).find('input[type="search"]').focus();
          }
      });

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');

      // initialization of countdowns
      var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
          yearsElSelector: '.js-cd-years',
          monthElSelector: '.js-cd-month',
          daysElSelector: '.js-cd-days',
          hoursElSelector: '.js-cd-hours',
          minutesElSelector: '.js-cd-minutes',
          secondsElSelector: '.js-cd-seconds'
      });

      // initialization of quantity counter
      $.HSCore.components.HSCountQty.init('.js-quantity');

      $(window).on('load', function () {
          // initialization of HSScrollBar component
          $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));
      });

      // initialization of revolution slider
      var tpj = jQuery;

      var revapi1014;
      tpj(document).ready(function () {
          if (tpj("#rev_slider_1014_1").revolution == undefined) {
              revslider_showDoubleJqueryError("#rev_slider_1014_1");
          } else {
              revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
                  sliderType: "standard",
                  jsFileLocation: "revolution/js/",
                  sliderLayout: "fullscreen",
                  dottedOverlay: "none",
                  delay: 9000,
                  navigation: {
                      keyboardNavigation: "off",
                      keyboard_direction: "horizontal",
                      mouseScrollNavigation: "off",
                      mouseScrollReverse: "default",
                      onHoverStop: "off",
                      touch: {
                          touchenabled: "on",
                          swipe_threshold: 75,
                          swipe_min_touches: 1,
                          swipe_direction: "horizontal",
                          drag_block_vertical: false
                      }
                      ,
                      arrows: {
                          style: "uranus",
                          enable: true,
                          hide_onmobile: true,
                          hide_under: 768,
                          hide_onleave: false,
                          tmp: '',
                          left: {
                              h_align: "left",
                              v_align: "center",
                              h_offset: 20,
                              v_offset: 0
                          },
                          right: {
                              h_align: "right",
                              v_align: "center",
                              h_offset: 20,
                              v_offset: 0
                          }
                      }
                  },
                  parallax: {
                      type: "mouse",
                      origo: "slidercenter",
                      speed: 2000,
                      levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                      disable_onmobile: "on"
                  },
                  responsiveLevels: [1240, 1024, 778, 480],
                  visibilityLevels: [1240, 1024, 778, 480],
                  gridwidth: [1240, 1024, 778, 480],
                  gridheight: [868, 768, 960, 600],
                  lazyType: "none",
                  shadow: 0,
                  spinner: "off",
                  stopLoop: "on",
                  stopAfterLoops: 0,
                  stopAtSlide: 1,
                  shuffle: "off",
                  autoHeight: "off",
                  fullScreenAutoWidth: "off",
                  fullScreenAlignForce: "off",
                  fullScreenOffsetContainer: "",
                  fullScreenOffset: "60px",
                  disableProgressBar: "on",
                  hideThumbsOnMobile: "off",
                  hideSliderAtLimit: 0,
                  hideCaptionAtLimit: 0,
                  hideAllCaptionAtLilmit: 0,
                  debugMode: false,
                  fallbacks: {
                      simplifyAll: "off",
                      nextSlideOnWindowFocus: "off",
                      disableFocusListener: false
                  }
              });
          }

          RsTypewriterAddOn(tpj, revapi1014);
      });
      $(document).on('ready', function () {
          // initialization of forms
          $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
          $.HSCore.helpers.HSFocusState.init();
      });

  </script>
</div>
<!-- End Scripts -->
