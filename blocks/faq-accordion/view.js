/* FAQ Accordion — smooth open/close animation */
document.addEventListener("DOMContentLoaded", () => {
	document.querySelectorAll(".dp-faq-item").forEach((item) => {
		var summary = item.querySelector(".dp-faq-question");
		var answer = item.querySelector(".dp-faq-answer");
		if (!summary || !answer) return;

		summary.addEventListener("click", (_e) => {
			// Let native <details> handle toggle, add animation class
			if (item.hasAttribute("open")) {
				// Closing: animate out
				answer.style.maxHeight = `${answer.scrollHeight}px`;
				requestAnimationFrame(() => {
					answer.style.maxHeight = "0px";
					answer.style.overflow = "hidden";
				});
			} else {
				// Opening: animate in
				answer.style.maxHeight = "0px";
				answer.style.overflow = "hidden";
				requestAnimationFrame(() => {
					answer.style.maxHeight = `${answer.scrollHeight}px`;
				});
			}
		});

		item.addEventListener("transitionend", () => {
			if (!item.hasAttribute("open")) {
				answer.style.maxHeight = "";
				answer.style.overflow = "";
			} else {
				answer.style.maxHeight = "";
				answer.style.overflow = "";
			}
		});
	});
});
