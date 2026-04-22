/* Quote Form — client-side validation */
document.addEventListener('DOMContentLoaded', function () {
	var form = document.getElementById('dp-quote-form');
	if (!form) return;

	var success = document.getElementById('dp-form-success');
	var submitBtn = form.querySelector('button[type="submit"]');

	form.addEventListener('submit', function (e) {
		e.preventDefault();

		// Clear previous errors
		form.querySelectorAll('.error').forEach(function (el) {
			el.classList.remove('error');
		});

		// Validate required fields
		var valid = true;
		var nameField = form.querySelector('#dp-name');
		var phoneField = form.querySelector('#dp-phone');

		if (!nameField.value.trim()) {
			nameField.classList.add('error');
			valid = false;
		}
		if (!phoneField.value.trim()) {
			phoneField.classList.add('error');
			valid = false;
		}

		// Validate email format if provided
		var emailField = form.querySelector('#dp-email');
		if (emailField.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value.trim())) {
			emailField.classList.add('error');
			valid = false;
		}

		if (!valid) return;

		// Show success state
		submitBtn.disabled = true;
		submitBtn.textContent = 'Sending...';

		// Simulate submission (replace with actual endpoint in production)
		setTimeout(function () {
			form.querySelectorAll('.dp-form-group, .dp-btn, .dp-form-disclaimer').forEach(function (el) {
				el.style.display = 'none';
			});
			success.style.display = 'block';
		}, 1200);
	});

	// Remove error class on input
	form.querySelectorAll('input, select, textarea').forEach(function (field) {
		field.addEventListener('input', function () {
			this.classList.remove('error');
		});
	});
});