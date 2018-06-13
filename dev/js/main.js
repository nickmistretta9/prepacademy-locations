jQuery(document).ready(function($) {

    //BACKTOTOP SMOOTH SCROLL
	$('a.smooth').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
				scrollTop: target.offset().top
			}, 800);
			return false;
			}
		}
	});

	// FORM VALIDATION
	$('.submit').bind("click", function(e) {
		var $submitButton = $(e.target);
		var $parentForm = $submitButton.closest('form');

		if ($parentForm.valid() && $submitButton.prop('type') == 'button') {
			$submitButton.prop('type','submit');
			$submitButton.click();
			$submitButton.prop('type','button');
		}
	});

	// $('#menu-item-48 ul').removeClass('.dropdown-menu');

	$('.testimonial-slider').slick({
		autoplay:false
	});

	var formTarget = $('.contact-page-form form');
	$('.footer-contact input').click(function() {
		$('.footer-contact .open').removeClass('open');
		$(this).next('span').addClass('open');
	});
	$('.footer-contact textarea').click(function() {
		$('.footer-contact .open').removeClass('open');
		$(this).next('span').addClass('open');
	});
	$('.footer-contact').click(function() {
		$('.footer-contact .open').removeClass('open');
	}).children().click(function(e) {
		return false;
	});

	$('.contact-page-form input').click(function() {
		$('.contact-page-form .open').removeClass('open');
		$(this).next('span').addClass('open');
	});
	$('.contact-page-form textarea').click(function() {
		$('.contact-page-form .open').removeClass('open');
		$(this).next('span').addClass('open');
	});
	$('.contact-page-form').click(function() {
		$('.contact-page-form .open').removeClass('open');
	}).children().click(function(e) {
		return false;
	});

	var topNav = $('.top-fix').offset().top;
	$(window).on('scroll', function() {
		if($(window).scrollTop() >= topNav) {
			$('.logo').addClass('small');
		} else {
			$('.logo').removeClass('small');
		}
	});

	var placeholderHeight = $('.top-fix').outerHeight();
	$(window).scroll(function() {
		var topBar = $('.top-fix'),
		scroll = $(window).scrollTop(),
		placeholder = $('.placeholder');

		if(scroll >= 25) {
			topBar.addClass('fixed');
			placeholder.css('height', placeholderHeight);
		} else {
			topBar.removeClass('fixed');
			placeholder.css('height', 0);
		}
	});

	var tutors = $('.tutor-outer');
	var numberOfTutorsPerLoad = 10;
	for(var i=numberOfTutorsPerLoad; i<tutors.length; i++) {
		tutors.eq(i).addClass('hide');
	}

	// Grade filtering for tutors
	$('.gradeFilter').change(function() {
		var grade = $(this).val();
		var tutorOuter = $('.tutor-outer');
		var height = tutorOuter.first().outerHeight();
		$(tutorOuter).each(function() {
			$(this).removeClass('hide');
			$(this).css('height', height);
			if(grade !== 'reset') {
				var gradesArray = [];
				var possibleGrades = $(this).find('.grades span').text().split(', ');
				for(var i=0; i<possibleGrades.length; i++) {
					gradesArray.push(possibleGrades[i]);
				}
				if(gradesArray.indexOf(grade) === -1) {
					$(this).addClass('hide');
				} else {
					$(this).removeClass('hide');
				}
			} else {
				for(var i=numberOfTutorsPerLoad; i<tutorOuter.length; i++) {
					tutorOuter.eq(i).addClass('hide');
				}
			}
		});
	});

	$('.subjectFilter').change(function() {
		var subject = $(this).val();
		var tutorOuter = $('.tutor-outer');
		var height = tutorOuter.first().outerHeight();
		$(tutorOuter).each(function() {
			$(this).removeClass('hide');
			$(this).css('height', height);
			if(subject !== 'reset') {
				var subjectsArray = [];
				var possibleSubjects = $(this).find('.subjects span').text().split(', ');
				for(var i=0; i<possibleSubjects.length; i++) {
					subjectsArray.push(possibleSubjects[i]);
				}
				if(subjectsArray.indexOf(subject) === -1) {
					$(this).addClass('hide');
				} else {
					$(this).removeClass('hide');
				}
			} else {
				for(var i=numberOfTutorsPerLoad; i<tutorOuter.length; i++) {
					tutorOuter.eq(i).addClass('hide');
				}
			}
		});
	});

	$('.nameFilter').change(function() {
		var name = $(this).val();
		var tutorOuter = $('.tutor-outer');
		var height = tutorOuter.first().outerHeight();
		$(tutorOuter).each(function() {
			$(this).removeClass('hide');
			$(this).css('height', height);
			if(name !== 'reset') {
				var possibleNames = $(this).find('.name').text();
				if(possibleNames !== name) {
					$(this).addClass('hide');
				} else {
					$(this).removeClass('hide');
				}
			} else {
				for(var i=numberOfTutorsPerLoad; i<tutorOuter.length; i++) {
					tutorOuter.eq(i).addClass('hide');
				}
			}
		});
	});

	function loadMoreTutors() {
		var tutorOuter = $('.tutor-outer');
		var count = 0;
		$('.tutor-outer').each(function() {
			if(!$(this).hasClass('hide')) {
				count++;
			}
		});
		for(var i=count; i<count+numberOfTutorsPerLoad; i++) {
			tutorOuter.eq(i).removeClass('hide');
		}
	}

	$('#loadMoreTutors').click(function(e) {
		e.preventDefault();
		loadMoreTutors();
	});

	$('.state-select').change(function() {
		$('.list').removeClass('hide');
		if($(this).val() === 'Ontario') {
			$('.list.quebec').addClass('hide');
		} else if($(this).val() === 'Quebec') {
			$('.list.ontario').addClass('hide');
		}
	});

});

function initMap() {
	var styledMapType = new google.maps.StyledMapType([
	  {
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#212121"
	      }
	    ]
	  },
	  {
	    "elementType": "labels.icon",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#757575"
	      }
	    ]
	  },
	  {
	    "elementType": "labels.text.stroke",
	    "stylers": [
	      {
	        "color": "#212121"
	      }
	    ]
	  },
	  {
	    "featureType": "administrative",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#757575"
	      }
	    ]
	  },
	  {
	    "featureType": "administrative.country",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#9e9e9e"
	      }
	    ]
	  },
	  {
	    "featureType": "administrative.land_parcel",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "administrative.locality",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#bdbdbd"
	      }
	    ]
	  },
	  {
	    "featureType": "administrative.neighborhood",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "poi",
	    "elementType": "labels.text",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "poi",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#757575"
	      }
	    ]
	  },
	  {
	    "featureType": "poi.park",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#181818"
	      }
	    ]
	  },
	  {
	    "featureType": "poi.park",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#616161"
	      }
	    ]
	  },
	  {
	    "featureType": "poi.park",
	    "elementType": "labels.text.stroke",
	    "stylers": [
	      {
	        "color": "#1b1b1b"
	      }
	    ]
	  },
	  {
	    "featureType": "road",
	    "elementType": "geometry.fill",
	    "stylers": [
	      {
	        "color": "#2c2c2c"
	      }
	    ]
	  },
	  {
	    "featureType": "road",
	    "elementType": "labels",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "road",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#8a8a8a"
	      }
	    ]
	  },
	  {
	    "featureType": "road.arterial",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "road.arterial",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#373737"
	      }
	    ]
	  },
	  {
	    "featureType": "road.highway",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#3c3c3c"
	      }
	    ]
	  },
	  {
	    "featureType": "road.highway",
	    "elementType": "labels",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "road.highway.controlled_access",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#4e4e4e"
	      }
	    ]
	  },
	  {
	    "featureType": "road.local",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "road.local",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#616161"
	      }
	    ]
	  },
	  {
	    "featureType": "transit",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#757575"
	      }
	    ]
	  },
	  {
	    "featureType": "water",
	    "elementType": "geometry",
	    "stylers": [
	      {
	        "color": "#000000"
	      }
	    ]
	  },
	  {
	    "featureType": "water",
	    "elementType": "labels.text",
	    "stylers": [
	      {
	        "visibility": "off"
	      }
	    ]
	  },
	  {
	    "featureType": "water",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      {
	        "color": "#3d3d3d"
	      }
	    ]
	  }
	]);
	var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 43.7186816, lng: -79.9301276},
		scrollwheel:false,
		zoom:9,
		mapTypeId:'roadmap'
	});
	map.mapTypes.set('styled_map', styledMapType);
	map.setMapTypeId('styled_map');
	var features =[
		{
			position:new google.maps.LatLng(43.1523383,-80.2926854),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Brantford and Hamilton</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Brantford, ON N3T 5B3</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (226) 778-7517</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.3794426,-79.8022951),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Burlington</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Burlington, ON L7L</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 310-9334</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Burlington</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.4530086,-79.6578551),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Oakville</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Oakville, ON L6J 3Z3</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 287-2131</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Oakville</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.7137852,-79.663999),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Burlington</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Burlington, ON L7L</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 310-9334</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Burlington</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.642244,-79.4775534),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of West Toronto & Etobicoke</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Toronto, ON M6S 3J8</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (647) 360-9162</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Toronto, Etobicoke</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.698249,-79.389791),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Midtown Toronto</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Toronto, ON M4S 1A9</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (647) 360-8874</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Toronto</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.7002668,-79.3942377),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of East Toronto</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Toronto, ON M4S 1J7</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (647) 697-6446</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Toronto</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.7325465,-79.4113278),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of North Toronto</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Toronto, ON M5M 2B1</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 966-9478</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Toronto</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.8123104,-79.1068753),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Durham</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Durham, ON L1W 2S2</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (226) 270-2062</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Durham</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.8771251,-79.28435),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Markham</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Markham, ON L3P</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 823-2031</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Markham</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.8588281,-79.4193905),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Richmond Hill</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Richmond Hill, ON L4B</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (905) 581-1076</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Richmond Hill</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(43.8780556,-79.5452946),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Vaughan</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Vaughan, ON L6A</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 652-0168</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Burlington</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(44.014214,-79.4828395),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Aurora</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Aurora, ON L4G 6K3</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (888) 683-2083</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Aurora</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		},
		{
			position:new google.maps.LatLng(44.0605432,-79.471206),
			type:'info',
			contentString: '<div class="info-window-outer"><p class="title">Prep Academy Tutors of Newmarket</p> <hr>' +
			'<div class="location"><i class="fa fa-map-marker"></i> Newmarket, ON L3Y</div>' +
			'<div class="phone"><i class="fa fa-phone"></i> (289) 803-3818</div>' +
			'<div class="cities"><p class="subtitle">Common Cities Served</p> <p>Newmarket</p></div>' +
			'<button class="btn-info"><a href="">View Website</a></button>' +
			'</div>'
		}
	];
	features.forEach(function(feature) {
		var infowindow = new google.maps.InfoWindow({
			content:feature.contentString
		});
		var marker = new google.maps.Marker({
			position:feature.position,
			icon:'http://prepacadtutors.wpengine.com/wp-content/themes/prepacademy/dist/images/map-marker.png',
			map:map
		});
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
	});
}

