let options = {
	'speed': 3000,
	'pause': true,
}

window.addEventListener('DOMContentLoaded', function() {
	let slider = document.querySelector('.rbd-review-slider');
	let slides = slider.querySelectorAll('.rbd-review');
	let total  = slides.length;
	let pause  = false;

	function pauseSlide(){
		slider.onmouseleave = function(){ pause = false; };
		slider.onmouseenter = function(){ pause = true; };
		return pause;
	}

	function slide(){
		if( options.pause && pauseSlide() ) return;

		let activeSlide = document.querySelector('.rbd-review-slider .rbd-review.rbd-curr');
		let prev, curr, next, soon;

		curr = activeSlide;
		prev = activeSlide.previousElementSibling;
		next = activeSlide.nextElementSibling;

		if( next != null ){
			soon = next.nextElementSibling == null ? slides[0] : next.nextElementSibling;
		} else {
			next = slides[0];
			soon = slides[1];
		}

		if( prev != null ) prev.classList.remove('rbd-prev', 'rbd-curr', 'rbd-next');
		if( curr != null ) curr.classList.remove('rbd-prev', 'rbd-curr', 'rbd-next'); curr.classList.add('rbd-prev');
		if( next != null ) next.classList.remove('rbd-prev', 'rbd-curr', 'rbd-next'); next.classList.add('rbd-curr');
		if( soon != null ) soon.classList.remove('rbd-prev', 'rbd-curr', 'rbd-next'); soon.classList.add('rbd-next');
	}

	let slideTimer = setInterval(function(){
		slide();
	}, options.speed);
}, true);



window.addEventListener('DOMContentLoaded', function() {
	let slider = document.querySelector('.rbb-review-slider');
	let slides = slider.querySelectorAll('.rbb-review');
	let total  = slides.length;
	let pause  = false;

	function pauseSlide(){
		slider.onmouseleave = function(){ pause = false; };
		slider.onmouseenter = function(){ pause = true; };
		return pause;
	}

	function slide(){
		if( options.pause && pauseSlide() ) return;

		let activeSlide = document.querySelector('.rbb-review-slider .rbb-review.rbb-curr');
		let prev, curr, next, soon;

		curr = activeSlide;
		prev = activeSlide.previousElementSibling;
		next = activeSlide.nextElementSibling;

		if( next != null ){
			soon = next.nextElementSibling == null ? slides[0] : next.nextElementSibling;
		} else {
			next = slides[0];
			soon = slides[1];
		}

		if( prev != null ) prev.classList.remove('rbb-prev', 'rbb-curr', 'rbb-next');
		if( curr != null ) curr.classList.remove('rbb-prev', 'rbb-curr', 'rbb-next'); curr.classList.add('rbb-prev');
		if( next != null ) next.classList.remove('rbb-prev', 'rbb-curr', 'rbb-next'); next.classList.add('rbb-curr');
		if( soon != null ) soon.classList.remove('rbb-prev', 'rbb-curr', 'rbb-next'); soon.classList.add('rbb-next');
	}

	let slideTimer = setInterval(function(){
		slide();
	}, options.speed);
}, true);



window.addEventListener('DOMContentLoaded', function() {
	let slider = document.querySelector('.rdd-review-slider');
	let slides = slider.querySelectorAll('.rdd-review');
	let total  = slides.length;
	let pause  = false;

	function pauseSlide(){
		slider.onmouseleave = function(){ pause = false; };
		slider.onmouseenter = function(){ pause = true; };
		return pause;
	}

	function slide(){
		if( options.pause && pauseSlide() ) return;

		let activeSlide = document.querySelector('.rdd-review-slider .rdd-review.rdd-curr');
		let prev, curr, next, soon;

		curr = activeSlide;
		prev = activeSlide.previousElementSibling;
		next = activeSlide.nextElementSibling;

		if( next != null ){
			soon = next.nextElementSibling == null ? slides[0] : next.nextElementSibling;
		} else {
			next = slides[0];
			soon = slides[1];
		}

		if( prev != null ) prev.classList.remove('rdd-prev', 'rdd-curr', 'rdd-next');
		if( curr != null ) curr.classList.remove('rdd-prev', 'rdd-curr', 'rdd-next'); curr.classList.add('rdd-prev');
		if( next != null ) next.classList.remove('rdd-prev', 'rdd-curr', 'rdd-next'); next.classList.add('rdd-curr');
		if( soon != null ) soon.classList.remove('rdd-prev', 'rdd-curr', 'rdd-next'); soon.classList.add('rdd-next');
	}

	let slideTimer = setInterval(function(){
		slide();
	}, options.speed);
}, true);
