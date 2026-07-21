/**
 * RIVO Admin Dashboard - Main JavaScript
 * Uses jQuery for UI interactions
 */

(function ($) {
  "use strict";

  /* ============================================
     Page Loading Animation
     ============================================ */
  $(window).on("load", function () {
    setTimeout(function () {
      $("#rivoLoader").addClass("hidden");
    }, 600);
  });

  /* ============================================
     Sidebar Toggle (Desktop Collapse)
     ============================================ */
  $("#sidebarToggle").on("click", function () {
    var $sidebar = $("#rivoSidebar");
    var isMobile = $(window).width() < 992;

    if (isMobile) {
      $sidebar.toggleClass("mobile-open");
      $("#sidebarOverlay").toggleClass("show");
    } else {
      $sidebar.toggleClass("collapsed");
      $("body").toggleClass("sidebar-collapsed");
    }
  });

  /* Close sidebar on overlay click (mobile) */
  $("#sidebarOverlay").on("click", function () {
    $("#rivoSidebar").removeClass("mobile-open");
    $(this).removeClass("show");
  });

  /* Close mobile sidebar on nav link click */
  $(".rivo-nav__link").on("click", function () {
    if ($(window).width() < 992) {
      $("#rivoSidebar").removeClass("mobile-open");
      $("#sidebarOverlay").removeClass("show");
    }
  });

  /* ============================================
     Animate Stat Cards on Scroll
     ============================================ */
  function animateStatCards() {
    $(".rivo-stat-card").each(function (index) {
      var $card = $(this);
      if (!$card.hasClass("animate-in")) {
        $card.addClass("animate-in");
      }
    });
  }

  animateStatCards();

  /* ============================================
     Animate Progress Bars
     ============================================ */
  function animateProgressBars() {
    $(".rivo-progress__bar").each(function () {
      var $bar = $(this);
      var width = $bar.data("width");
      if (width) {
        $bar.css("width", "0%");
        setTimeout(function () {
          $bar.css("width", width + "%");
        }, 300);
      }
    });
  }

  animateProgressBars();

  /* ============================================
     Animate Chart Bars
     ============================================ */
  function animateChartBars() {
    $(".rivo-chart__bar").each(function (index) {
      var $bar = $(this);
      var height = $bar.data("height");
      $bar.css("height", "0");
      setTimeout(function () {
        $bar.css("height", height + "px");
      }, 200 + index * 80);
    });
  }

  if ($(".rivo-chart__bar").length) {
    animateChartBars();
  }

  /* ============================================
     Message List Item Click
     ============================================ */
  $(".rivo-message-item").on("click", function (e) {
    e.preventDefault();
    $(".rivo-message-item").removeClass("active");
    $(this).addClass("active").removeClass("unread");
    $(this).find(".rivo-message-item__badge").fadeOut();
  });

  /* ============================================
     Form Reset Button
     ============================================ */
  $(".rivo-form-reset").on("click", function (e) {
    e.preventDefault();
    var $form = $(this).closest("form");
    $form[0].reset();
    $form.find(".form-control").removeClass("is-valid is-invalid");
  });

  /* ============================================
     Fake Form Validation Style on Submit
     ============================================ */
  $(".rivo-validate-form").on("submit", function (e) {
    e.preventDefault();
    var $form = $(this);
    var valid = true;

    $form.find("[required]").each(function () {
      var $field = $(this);
      if (!$field.val() || !$field.val().trim()) {
        $field.addClass("is-invalid").removeClass("is-valid");
        valid = false;
      } else {
        $field.addClass("is-valid").removeClass("is-invalid");
      }
    });

    if (valid) {
      $form.find(".rivo-form-success").fadeIn().delay(2500).fadeOut();
    }
  });

  /* ============================================
     Upload Field Click Trigger
     ============================================ */
  $(".rivo-upload").on("click", function () {
    $(this).siblings('input[type="file"]').trigger("click");
  });

  $('input[type="file"]').on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    if (fileName) {
      $(this).siblings(".rivo-upload").find(".rivo-upload__text").text(fileName);
    }
  });

  /* ============================================
     Table Row Hover Effect
     ============================================ */
  $(".rivo-table tbody tr").hover(
    function () {
      $(this).css("transform", "scale(1)");
    },
    function () {
      $(this).css("transform", "scale(1)");
    }
  );

  /* ============================================
     Navbar Search Focus Effect
     ============================================ */
  $(".rivo-navbar__search input").on("focus", function () {
    $(this).parent().addClass("focused");
  }).on("blur", function () {
    $(this).parent().removeClass("focused");
  });

  /* ============================================
     Dropdown Hover Enhancement (desktop)
     ============================================ */
  if ($(window).width() >= 992) {
    $(".rivo-navbar .dropdown").on("mouseenter", function () {
      $(this).find(".dropdown-toggle").dropdown("show");
    }).on("mouseleave", function () {
      var $dropdown = $(this);
      setTimeout(function () {
        if (!$dropdown.is(":hover")) {
          $dropdown.find(".dropdown-toggle").dropdown("hide");
        }
      }, 200);
    });
  }

  /* ============================================
     Window Resize Handler
     ============================================ */
  $(window).on("resize", function () {
    if ($(window).width() >= 992) {
      $("#rivoSidebar").removeClass("mobile-open");
      $("#sidebarOverlay").removeClass("show");
    }
  });

  /* ============================================
     Login Form Submit (demo)
     ============================================ */
  $("#loginForm").on("submit", function (e) {
    e.preventDefault();
    window.location.href = "index.html";
  });

})(jQuery);
