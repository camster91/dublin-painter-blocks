/* Quote Form — client-side validation + AJAX submission */
document.addEventListener("DOMContentLoaded", () => {
	const form = document.getElementById("dp-quote-form");
	if (!form) return;

	const msgEl = document.getElementById("dp-form-message");
	const submitBtn = form.querySelector('button[type="submit"]');
	const successMsg =
		msgEl?.dataset?.success ||
		"Thank you! We will get back to you within 24 hours.";
	const errorMsg =
		msgEl?.dataset?.error || "Something went wrong. Please try again.";

	form.addEventListener("submit", (e) => {
		e.preventDefault();

		// Clear previous errors
		form.querySelectorAll(".error").forEach((el) => {
			el.classList.remove("error");
		});

		// Validate required fields
		let valid = true;
		const nameField = form.querySelector("#dp-name");
		const phoneField = form.querySelector("#dp-phone");

		if (!nameField.value.trim()) {
			nameField.classList.add("error");
			valid = false;
		}
		if (!phoneField.value.trim()) {
			phoneField.classList.add("error");
			valid = false;
		}

		// Validate email format if provided
		const emailField = form.querySelector("#dp-email");
		if (
			emailField.value.trim() &&
			!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value.trim())
		) {
			emailField.classList.add("error");
			valid = false;
		}

		if (!valid) return;

		// Show loading state
		submitBtn.disabled = true;
		submitBtn.textContent = "Sending...";

		// Collect form data
		const data = new FormData(form);

		// Try the form action URL first (for external endpoints like Formspree)
		const actionUrl = form.getAttribute("action") || "";

		if (actionUrl) {
			// External endpoint
			fetch(actionUrl, { method: "POST", body: data, mode: "no-cors" })
				.then(() => showSuccess())
				.catch(() => showError());
		} else {
			// Default WP AJAX handler
			data.append("action", "dp_quote_submit");
			data.append("nonce", window.dpNonce || "");

			fetch("/staging/wp-admin/admin-ajax.php", { method: "POST", body: data })
				.then((res) => res.json())
				.then((res) => {
					res.success ? showSuccess() : showError();
				})
				.catch(() => showError());
		}
	});

	function showSuccess() {
		msgEl.textContent = successMsg;
		msgEl.className = "dp-form-message dp-form-success";
		msgEl.style.display = "block";
		submitBtn.style.display = "none";
		form.querySelectorAll(".dp-form-group").forEach((el) => {
			el.style.display = "none";
		});
	}

	function showError() {
		msgEl.textContent = errorMsg;
		msgEl.className = "dp-form-message dp-form-error";
		msgEl.style.display = "block";
		submitBtn.disabled = false;
		submitBtn.textContent = submitBtn.dataset.originalText || "Get Free Quote";
	}

	// Store original button text
	if (submitBtn) submitBtn.dataset.originalText = submitBtn.textContent;

	// Remove error class on input
	form.querySelectorAll("input, select, textarea").forEach((field) => {
		field.addEventListener("input", function () {
			this.classList.remove("error");
		});
	});
});
