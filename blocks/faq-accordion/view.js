/* FAQ Accordion — smooth open/close animation */
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.dp-faq-item').forEach(function (item) {
		var summary = item.querySelector('.dp-faq-question');
		var answer = item.querySelector('.dp-faq-answer');
		if (!summary || !answer) return;

		summary.addEventListener('click', function (e) {
			// Let native <details> handle toggle, add animation class
			if (item.hasAttribute('open')) {
				// Closing: animate out
				answer.style.maxHeight = answer.scrollHeight + 'px';
				requestAnimationFrame(function () {
					answer.style.maxHeight = '0px';
					answer.style.overflow = 'hidden';
				});
			} else {
				// Opening: animate in
				answer.style.maxHeight = '0px';
				answer.style.overflow = 'hidden';
				requestAnimationFrame(function () {
					answer.style.maxHeight = answer.scrollHeight + 'px';
				});
			}
		});

		item.addEventListener('transitionend', function () {
			if (!item.hasAttribute('open')) {
				answer.style.maxHeight = '';
				answer.style.overflow = '';
			} else {
				answer.style.maxHeight = '';
				answer.style.overflow = '';
			}
		});
	});
});