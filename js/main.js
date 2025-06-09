(function ($) {
  "use strict";

  var isMobile = {
    Android: function () {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
      return (
        isMobile.Android() ||
        isMobile.BlackBerry() ||
        isMobile.iOS() ||
        isMobile.Opera() ||
        isMobile.Windows()
      );
    },
  };

  /* Go Top
  -------------------------------------------------------------------------------------*/
  var goTop = function () {
    var $goTop = $("#goTop");

    $(window).on("scroll", function () {
      var scrollTop = $(window).scrollTop();

      if (scrollTop > 100) {
        $goTop.addClass("show");
      } else {
        $goTop.removeClass("show");
      }
    });

    $goTop.on("click", function () {
      $("html, body").animate({ scrollTop: 0 }, 0);
    });
  };

  /* color swatch product
  -------------------------------------------------------------------------*/
  var swatchColor = function () {
    if ($(".card-product").length > 0) {
      $(".color-swatch").on("click, mouseover", function () {
        var swatchColor = $(this).find("img").attr("src");
        var imgProduct = $(this).closest(".card-product").find(".img-product");
        imgProduct.attr("src", swatchColor);
        $(this)
          .closest(".card-product")
          .find(".color-swatch.active")
          .removeClass("active");

        $(this).addClass("active");
      });
    }
  };

  /* footer accordion
  -------------------------------------------------------------------------*/
  var footer = function () {
    var args = { duration: 250 };
    $(".footer-heading-moblie").on("click", function () {
      $(this).parent(".footer-col-block").toggleClass("open");
      if (!$(this).parent(".footer-col-block").is(".open")) {
        $(this).next().slideUp(args);
      } else {
        $(this).next().slideDown(args);
      }
    });
  };

  /* tabs
  -------------------------------------------------------------------------*/
  var tabs = function () {
    $(".widget-tabs").each(function () {
      $(this)
        .find(".widget-menu-tab")
        .children(".item-title")
        .on("click", function () {
          var liActive = $(this).index();
          var contentActive = $(this)
            .siblings()
            .removeClass("active")
            .parents(".widget-tabs")
            .find(".widget-content-tab")
            .children()
            .eq(liActive);
          contentActive.addClass("active").fadeIn("slow");
          contentActive.siblings().removeClass("active");
          $(this)
            .addClass("active")
            .parents(".widget-tabs")
            .find(".widget-content-tab")
            .children()
            .eq(liActive);
        });
    });
  };

  /* button wishlist
  -------------------------------------------------------------------------*/
  var btnWishlist = function () {
    if ($(".btn-icon-action").length) {
      console.log($(".btn-icon-action").length);
      $(".btn-icon-action").on("click", function (e) {
        $(this).toggleClass("active");
      });
    }
  };

  /* variant picker
  -------------------------------------------------------------------------*/
  var variantPicker = function () {
    if ($(".variant-picker-item").length) {
      $(".variant-picker-item label").on("click", function (e) {
        $(this)
          .closest(".variant-picker-item")
          .find(".variant-picker-label-value")
          .text($(this).data("value"));
      });
    }
    if ($(".variant-picker-item").length) {
      $(".select-size").on("click", function (e) {
        $(this)
          .closest(".variant-picker-item")
          .find(".variant-picker-label-value")
          .text($(this).data("value"));
      });
    }
  };

  /* button loading
  -------------------------------------------------------------------------*/
  var btnLoading = function () {
    if ($(".tf-btn-loading").length) {
      $(".tf-btn-loading").on("click", function (e) {
        $(this).addClass("loading");
        var $this = $(this);
        setTimeout(function () {
          $this.removeClass("loading");
        }, 600);
      });
    }
  };

  /* infinite scroll
  -------------------------------------------------------------------------*/
  var infiniteScroll = function () {
    var display = $(".loadmore-item").data("display") || 4;
    var count = $(".loadmore-item").data("count") || 4;

    $(".fl-item").slice(0, display).show();
    $(".fl-item2").slice(0, display).show();
    $(".fl-item3").slice(0, display).show();

    if ($(".scroll-loadmore").length > 0) {
      $(window).scroll(function () {
        if (
          $(window).scrollTop() >=
          $(document).height() - $(window).height()
        ) {
          setTimeout(() => {
            $(".fl-item:hidden").slice(0, count).show();
            if ($(".fl-item:hidden").length == 0) {
              $(".view-more-button").hide();
            }
          }, 0);
        }
      });
    }
    if ($(".loadmore-item").length > 0) {
      $(".btn-loadmore").on("click", function () {
        setTimeout(() => {
          $(".fl-item:hidden").slice(0, count).show();
          if ($(".fl-item:hidden").length == 0) {
            $(".view-more-button").hide();
          }
        }, 600);
      });
    }
    if ($(".loadmore-item2").length > 0) {
      $(".btn-loadmore2").on("click", function () {
        setTimeout(() => {
          $(".fl-item2:hidden").slice(0, count).show();
          if ($(".fl-item2:hidden").length == 0) {
            $(".view-more-button2").hide();
          }
        }, 600);
      });
    }
    if ($(".loadmore-item3").length > 0) {
      $(".btn-loadmore3").on("click", function () {
        setTimeout(() => {
          $(".fl-item3:hidden").slice(0, count).show();
          if ($(".fl-item3:hidden").length == 0) {
            $(".view-more-button3").hide();
          }
        }, 600);
      });
    }
  };

  /* header sticky
  -------------------------------------------------------------------------*/
  var headerSticky = function () {
    let lastScrollTop = 0;
    let delta = 5;
    let navbarHeight = $("header").outerHeight();
    let didScroll = false;

    $(window).scroll(function () {
      didScroll = true;
    });

    setInterval(function () {
      if (didScroll) {
        let st = $(window).scrollTop();
        navbarHeight = $("header").outerHeight();

        if (st > navbarHeight) {
          if (st > lastScrollTop + delta) {
            $("header").css("top", `-${navbarHeight}px`);
          } else if (st < lastScrollTop - delta) {
            $("header").css("top", "0");
            $("header").addClass("header-bg");
          }
        } else {
          $("header").css("top", "unset");
          $("header").removeClass("header-bg");
        }
        lastScrollTop = st;
        didScroll = false;
      }
    }, 250);
  };

  // Dom Ready
  $(function () {
    goTop();
    tabs();
    swatchColor();
    footer();
    btnWishlist();
    btnLoading();
    variantPicker();
    infiniteScroll();
    headerSticky();
    new WOW().init();
  });
})(jQuery);
