/**
 * File customizer-preview.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  "use strict";
  // Site title and description.
  wp.customize("blogname", function (setting) {
    setting.bind(function (text) {
      $(".site-title").text(text);
    });
  });
  wp.customize("blogdescription", function (setting) {
    setting.bind(function (text) {
      $(".site-description").text(text);
    });
  });

  // Range preview
  business_chat_customizer_preview_variables.LAYOUT_VARIABLES.RANGE.forEach(
    createRangeSettingPreview
  );

  function createRangeSettingPreview(rangeSetting) {
    wp.customize(rangeSetting, function (setting) {
      setting.bind(function (value) {
        $(":root").css(rangeSetting, value + "px");
      });
    });
  }

  // Header text color / logo text color.
  wp.customize("header_textcolor", function (setting) {
    setting.bind(function (color) {
      $(".logofont.site-title").css({
        color: color,
      });
    });
  });
})(jQuery);
