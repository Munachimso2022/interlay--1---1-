if(typeof jQuery!="undefined"){var LAE_Carousel_Helper;(function($){"use strict";LAE_Carousel_Helper=function($scope,selector){this._$element=$scope.find(selector).eq(0)};LAE_Carousel_Helper.prototype={_$element:null,init:function(){var $carouselElem=this._$element;if($carouselElem.length>0){var rtl=$carouselElem.attr("dir")==="rtl";var settings=$carouselElem.data("settings");var arrows=settings["arrows"];var dots=settings["dots"];var autoplay=settings["autoplay"];var adaptive_height=settings["adaptive_height"];var autoplay_speed=parseInt(settings["autoplay_speed"])||3e3;var animation_speed=parseInt(settings["animation_speed"])||300;var fade="fade"in settings&&settings["fade"]===true;var vertical="vertical"in settings&&settings["vertical"]===true;var pause_on_hover=settings["pause_on_hover"];var pause_on_focus="pause_on_focus"in settings&&settings["pause_on_focus"]==true;var display_columns=parseInt(settings["display_columns"])||4;var scroll_columns=parseInt(settings["scroll_columns"])||4;var tablet_width=parseInt(settings["tablet_width"])||800;var tablet_display_columns=parseInt(settings["tablet_display_columns"])||2;var tablet_scroll_columns=parseInt(settings["tablet_scroll_columns"])||2;var mobile_width=parseInt(settings["mobile_width"])||480;var mobile_display_columns=parseInt(settings["mobile_display_columns"])||1;var mobile_scroll_columns=parseInt(settings["mobile_scroll_columns"])||1;$carouselElem.slick({arrows:arrows,dots:dots,infinite:true,autoplay:autoplay,autoplaySpeed:autoplay_speed,speed:animation_speed,fade:fade,vertical:vertical,pauseOnHover:pause_on_hover,pauseOnFocus:pause_on_focus,adaptiveHeight:adaptive_height,slidesToShow:display_columns,slidesToScroll:scroll_columns,rtl:rtl,responsive:[{breakpoint:tablet_width,settings:{slidesToShow:tablet_display_columns,slidesToScroll:tablet_scroll_columns}},{breakpoint:mobile_width,settings:{slidesToShow:mobile_display_columns,slidesToScroll:mobile_scroll_columns}}]})}}}})(jQuery)}