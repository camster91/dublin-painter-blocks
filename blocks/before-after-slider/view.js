/**
 * Before/After Slider — Frontend JavaScript
 *
 * Handles mouse/touch drag interaction for the clip-path slider.
 * Ported from Arcan Painting React component.
 */
(() => {
	document.addEventListener("DOMContentLoaded", () => {
		const sliders = document.querySelectorAll("[data-slider]");

		sliders.forEach((slider) => {
			initSlider(slider);
		});

		// Also init on block load (for dynamic content)
		if (typeof wp !== "undefined" && wp.hooks) {
			// No-op for now — IntersectionObserver handles reveal
		}
	});

	function initSlider(slider) {
		const afterLayer = slider.querySelector(".dp-ba-image--after");
		const handle = slider.querySelector(".dp-ba-handle");

		if (!afterLayer || !handle) return;

		let isDragging = false;

		// Set initial position to 50%
		updatePosition(slider, afterLayer, handle, 50);

		// Mouse events
		slider.addEventListener("mousedown", (e) => {
			isDragging = true;
			updateFromEvent(e, slider, afterLayer, handle);
			e.preventDefault();
		});

		document.addEventListener("mousemove", (e) => {
			if (isDragging) {
				updateFromEvent(e, slider, afterLayer, handle);
			}
		});

		document.addEventListener("mouseup", () => {
			isDragging = false;
		});

		// Touch events
		slider.addEventListener(
			"touchstart",
			(e) => {
				isDragging = true;
				updateFromEvent(e.touches[0], slider, afterLayer, handle);
				e.preventDefault();
			},
			{ passive: false },
		);

		slider.addEventListener(
			"touchmove",
			(e) => {
				if (isDragging) {
					updateFromEvent(e.touches[0], slider, afterLayer, handle);
					e.preventDefault();
				}
			},
			{ passive: false },
		);

		slider.addEventListener("touchend", () => {
			isDragging = false;
		});

		// Keyboard accessibility
		handle.setAttribute("tabindex", "0");
		handle.setAttribute("role", "slider");
		handle.setAttribute("aria-label", "Compare before and after images");
		handle.setAttribute("aria-valuemin", "0");
		handle.setAttribute("aria-valuemax", "100");
		handle.setAttribute("aria-valuenow", "50");

		handle.addEventListener("keydown", (e) => {
			let percent = parseFloat(handle.getAttribute("aria-valuenow")) || 50;
			if (e.key === "ArrowLeft" || e.key === "ArrowDown") {
				percent = Math.max(0, percent - 2);
				updatePosition(slider, afterLayer, handle, percent);
				e.preventDefault();
			} else if (e.key === "ArrowRight" || e.key === "ArrowUp") {
				percent = Math.min(100, percent + 2);
				updatePosition(slider, afterLayer, handle, percent);
				e.preventDefault();
			}
		});
	}

	function updateFromEvent(e, slider, afterLayer, handle) {
		const rect = slider.getBoundingClientRect();
		const x = e.clientX - rect.left;
		const percent = Math.max(0, Math.min(100, (x / rect.width) * 100));
		updatePosition(slider, afterLayer, handle, percent);
	}

	function updatePosition(_slider, afterLayer, handle, percent) {
		// Update clip-path on after image
		afterLayer.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;

		// Update handle position
		handle.style.left = `${percent}%`;
		handle.setAttribute("aria-valuenow", Math.round(percent));
	}
})();
