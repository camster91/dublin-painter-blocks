/**
 * Dublin Painter Blocks — Shared Utilities
 *
 * IntersectionObserver for scroll reveal animations.
 * Loaded globally, used by all blocks.
 */
(() => {
	// Scroll reveal with IntersectionObserver
	document.addEventListener("DOMContentLoaded", () => {
		const revealElements = document.querySelectorAll(".dp-reveal");

		if (!revealElements.length) return;

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.classList.add("is-visible");
						observer.unobserve(entry.target);
					}
				});
			},
			{
				threshold: 0.1,
				rootMargin: "0px 0px -50px 0px",
			},
		);

		revealElements.forEach((el) => {
			observer.observe(el);
		});
	});
})();
