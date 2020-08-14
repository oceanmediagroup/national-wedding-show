window.$ = window.jQuery = require('jquery');
$.support.cors = true;

import 'babel-polyfill';
import LazyLoad from 'vanilla-lazyload';

var lazyLoadInstance = new LazyLoad({
	elements_selector: ".lazy"
});

let Popper = require('../../node_modules/popper.js/dist/umd/popper.js');
require('../../node_modules/bootstrap/dist/js/bootstrap.js');

require('./api-urls')

require('./menu');
require('./carousels');
require('./featured-pages');
require('./video-resize');

if ($('.inspiration-cards').length) {
	require('../../node_modules/imagesloaded/imagesloaded.pkgd');
	require('./media-feed/loadFeedItems');
}

$(document).ready(function () {
	$('.toogle-button').on('click', function (e) {
		e.preventDefault();
		$(this).toggleClass('open');
		$(this).parent().find('ul').fadeToggle();
	});

	if ($('#exhibitorsList').length) {
		require('./exhibitors-list/exhibitorsList');
	}

	if ($('#singleExhibitor').length) {
		require('./exhibitors-list/singleExhibitor');
	}

	if ($('#singleLocationExhibitors').length) {
		require('./exhibitors-list/locationExhibitorsList');
	}
});

require('./media-feed/loadFeedItems');

require('./dotmailer');

$(window).on('load', function () {
	if ($("#ytplayer").length) {
		$(".tutorial-modal").on("hidden.bs.modal", function () {
			stopVideo(this);
		});
	}
});

function stopVideo(element) {
	let iframe = element.querySelector('iframe');
	let video = element.querySelector('video');
	if (iframe !== null) {
		let iframeSrc = iframe.src;
		iframe.src = iframeSrc;
	}

	if (video !== null) {
		video.pause();
	}
};

if (document.body.classList.contains('features-template-default')) {
	if (document.querySelector('.featured-at ul').childElementCount == 2) {
		document.querySelector('.featured-at ul li').classList.add('featured-at-noline');
	}
}

function goToHash() {
	var hashElem = window.location.hash
	hashElem = hashElem.substr(1, hashElem.length)
	window.location.hash = ""
	if (hashElem) {
		window.onload = function () {
			var btn1 = document.querySelector('[href="#' + hashElem + '"]')
			var btn2 = document.querySelector('[data-filter*=".' + hashElem + '"]')
			if (btn1) {
				btn1.click()
			} else if (btn2) {
				btn2.click()
				if (hashElem = 'tutorial') {
					document.querySelector('#loadMoreMedia').click();
				}
			} else {
				return
			}
		}
	}
}
goToHash()

jQuery('document').ready(function () {
	var watchItems = function () {
		var items = jQuery('.alm-listing .col-6');
		if (items.length <= 5) {
			if (items.length % 2 == 1) {
				items.last().addClass('hide-on-mobile');
			}
		}
		jQuery.fn.almDone = function () {
			var items = jQuery('.alm-listing .col-6');
			if (items.length % 2 == 1) {
				items.last().addClass('hide-on-mobile');
			}
		};
	}
	watchItems();

	$('a[data-target="#socialModal"]').on('click', function () {
		setTimeout(function () {
			$('.modal-backdrop').on('click', function () {
				$('#socialModal').modal('hide');
			})
		}, 500)
	})

});

$(document).on('click', '[data-toggle="exhibit-lightbox"]', function (event) {
	event.preventDefault();
	$(this).ekkoLightbox({
		alwaysShowClose: true,
		leftArrow: '<img src="https://nationalweddingshow.co.uk/assets/img/larr.png" />',
		rightArrow: '<img src="https://nationalweddingshow.co.uk/assets/img/rarr.png" />',
		onShow: function () {
			$('body').addClass('exhibit-lightbox-opened');
			$('.ekko-lightbox').find('.close').find('span').html('<img src="https://nationalweddingshow.co.uk/assets/img/close.png" />');
			$('.modal-body').add('.ekko-lightbox-container').add('.ekko-lightbox-item').on('click', function (e) {
				if (e.target !== this) {
					return;
				}
				$('.modal-header').find('.close').click();
			})
		},
		onContentLoaded: function () {
			var imageTitle = $('.ekko-lightbox .modal-title').text();
			var imageWidth = $('.ekko-lightbox-item.show').find('img').width();
			$('.ekko-lightbox-container').find('.ekko-lightbox-item').each(function () {
				if (imageTitle.length >= 2) {
					$(this).append('<p class="modal-image-description" style="width: ' + imageWidth + 'px!important">' + imageTitle + '</p>')
				}
			})
		},
		onHide: function () {
			$('body').removeClass('exhibit-lightbox-opened');
		}
	});
});

$('.exhibitor-list__title-top').on('click', function () {
	$(this).toggleClass('active');
})

$(document).ready(function () {
	$('#WEDDINGDATE').datepicker({
		minDate: new Date(),
	});
	$('#ENGAGEMENTDATE').datepicker();
	const $inputDate = $(".datepicker");
	if ($inputDate.length) {
		$inputDate.each(function () {
			const $input = $(this);
			$input.on('change', function () {
				if ($input.val() === '') {
					$input.removeClass('has-value');
				} else {
					$input.addClass('has-value');
				}
			})
		})
	}
})