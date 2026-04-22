/**
 * Before/After Slider — Frontend JavaScript
 *
 * Handles mouse/touch drag interaction for the before/after slider.
 * Works with the HTML structure from render.php:
 *   .dp-ba-slider[data-slider]
 *     img.dp-ba-after   (after image, shown underneath)
 *     img.dp-ba-before  (before image, clipped via clip-path)
 *     .dp-ba-divider    (drag handle)
 *       .dp-ba-handle
 */
(() => {
	document.addEventListener("DOMContentLoaded", () => {
		const sliders = document.querySelectorAll("[data-slider]");
		sliders.forEach((slider) => {
			initSlider(slider);
		});
	});

	function initSlider(slider) {
		const beforeImg = slider.querySelector(".dp-ba-before");
		const handle = slider.querySelector(".dp-ba-handle");

		if (!beforeImg || !handle) {
			// Try alternate structure
			const afterLayer = slider.querySelector(".dp-ba-image--after");
			const altHandle = slider.querySelector(".dp-ba-handle");
			if (!afterLayer || !altHandle) {
				return;
			}
		}

		let isDragging = false;

		// Set initial position to 50%
		updatePosition(slider, beforeImg, handle, 50);

		// Mouse events
		slider.addEventListener("mousedown", (e) => {
			isDragging = true;
			updateFromEvent(e, slider, beforeImg, handle);
			e.preventDefault();
		});

		document.addEventListener("mousemove", (e) => {
			if (isDragging) updateFromEvent(e, slider, beforeImg, handle);
		});

		document.addEventListener("mouseup", () => {
			isDragging = false;
		});

		// Touch events
		slider.addEventListener(
			"touchstart",
			(e) => {
				isDragging = true;
				updateFromEvent(e.touches[0], slider, beforeImg, handle);
				e.preventDefault();
			},
			{ passive: false },
		);

		slider.addEventListener(
			"touchmove",
			(e) => {
				if (isDragging) {
					updateFromEvent(e.touches[0], slider, beforeImg, handle);
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
				updatePosition(slider, beforeImg, handle, percent);
				e.preventDefault();
			} else if (e.key === "ArrowRight" || e.key === "ArrowUp") {
				percent = Math.min(100, percent + 2);
				updatePosition(slider, beforeImg, handle, percent);
				e.preventDefault();
			}
		});
	}

	function updateFromEvent(e, slider, beforeImg, handle) {
		const rect = slider.getBoundingClientRect();
		const x = e.clientX - rect.left;
		const percent = Math.max(0, Math.min(100, (x / rect.width) * 100));
		updatePosition(slider, beforeImg, handle, percent);
	}

	function updatePosition(_slider, beforeImg, handle, percent) {
		if (beforeImg) {
			// Clip the before image from the right side
			beforeImg.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
		}
		if (handle) {
			handle.style.left = `${percent}%`;
			handle.setAttribute("aria-valuenow", Math.round(percent));

			// Update divider line position
			const divider = handle.parentElement;
			if (divider) {
				divider.style.left = `${percent}%`;
			}
		}
	}
})();
