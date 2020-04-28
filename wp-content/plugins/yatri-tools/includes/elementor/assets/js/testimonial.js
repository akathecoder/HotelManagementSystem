(function ($) {

  var WidgetTestimonialHandler = function ($scope, $) {
    var slidesToShow     = $scope.find('.yatri-tools-elementor-testimonial').data('show-slides');
    var slidesToScroll   = $scope.find('.yatri-tools-elementor-testimonial').data('scroll-slides');
    var autoplayStatus   = $scope.find('.yatri-tools-elementor-testimonial').data('autoplay-status');
    var autoplaySpeed    = $scope.find('.yatri-tools-elementor-testimonial').data('autoplay-speed');
    var transitionSpeed  = $scope.find('.yatri-tools-elementor-testimonial').data('transition-speed');
    var pauseOnHover     = $scope.find('.yatri-tools-elementor-testimonial').data('hover-pause');
    var infiniteLoop     = $scope.find('.yatri-tools-elementor-testimonial').data('infinite-looping');
    var transitionSpeed  = $scope.find('.yatri-tools-elementor-testimonial').data('transition-speed');

    $scope.find(".yatri-tools-elementor-testimonial").slick({
      infinite: infiniteLoop,
      speed: transitionSpeed,
      autoplay: autoplayStatus,
      autoplaySpeed: autoplaySpeed,
      slidesToShow: slidesToShow,
      slidesToScroll: slidesToScroll,
      pauseOnHover: pauseOnHover,
      prevArrow: $scope.find('.yatri-tools-elementor-testimonial-wrapper .prev-next .prev'),
      nextArrow: $scope.find('.yatri-tools-elementor-testimonial-wrapper .prev-next .next'),
      dots: true,
    });
  };

  // Make sure you run this code under Elementor.
  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/yte-testimonial.default', WidgetTestimonialHandler);
  });
})(jQuery);