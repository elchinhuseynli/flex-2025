<?php
/*
Template name: page-start-project
*/
?>
    <!DOCTYPE html>
<html data-wf-page="68176fd0ba19dd766d87023d" data-wf-site="651bf4b86dfb35365e58e1ff" lang="cs">
	<?php get_template_part("header_block", ""); ?>
	<body>
<?php if(function_exists('get_field')) { echo get_field('body_code', 'option'); } ?>

		<div id="modal" class="modal-window">
			<div class="modal__container">
				<header class="modal__header">
					<h2 class="modal__title">Poptávkový formulář</h2><button popovertargetaction="hide" popovertarget="modal" aria-hidden="true" class="modal__close"></button></header>
				<main id="modal-1-content" class="modal__content">
					<div class="flex-form">
						<div class="form-css w-embed">
							<style>
/* Form css */
.flex-form_step.active .flex-form_step-number {
  background-color: var(--_form---accent-color);
  color: white;
  border-color: var(--_form---accent-color);
}

.flex-form_step.active .flex-form_step-text {
  color: var(--_form---accent-color);
}

.flex-form_step.completed .flex-form_step-number {
  background-color: var(--_form---accent-color);
  color: white;
  border-color: var(--_form---accent-color);
}
.flex-form_step.inactive {
  opacity: 1;
  cursor: not-allowed;
}

.flex-form_step.inactive .flex-form_step-number {
  background-color: var(--_form---secondary-color);
  border-color: var(--_form---border-color);
  color: var(--_form---text-light);
}

.flex-form_step.inactive .flex-form_step-text {
  color: var(--_form---text-light);
}

.flex-form_page.active {
  display: block;
  animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(5px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.flex-form_full-width {
  grid-column: 1 / -1;
}

.flex-form_input:focus {
  outline: none;
  border-color: var(--_form---accent-color);
}

.flex-form_input::placeholder {
  color: #a1a1aa;
}

textarea.flex-form_input {
  min-height: 7.5rem;
}

.flex-form_checkbox input,
.flex-form_radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.flex-form_radio input:checked + .flex-form_radio-label {
  border-color: var(--_form---accent-color);
  background-color: var(--_form---accent-color-light);
}

.flex-form_checkbox input:checked + .flex-form_checkbox-label {
  border-color: var(--_form---accent-color);
  background-color: var(--_form---accent-color-light);
}

/* Privacy Policy Checkbox Styles */
.privacy-policy {
  margin-top: 1.5rem;
  position: relative;
}

.privacy-policy .flex-form_checkbox-label {
  text-align: left;
  padding: 1rem;
  line-height: 1.5;
  transition: all 0.3s ease;
}

.privacy-policy .flex-form_checkbox-label a {
  color: var(--_form---accent-color);
  text-decoration: none;
  font-weight: 500;
}

.privacy-policy .flex-form_checkbox-label a:hover {
  text-decoration: underline;
}

/* Error state styles */
.privacy-policy.error .flex-form_checkbox-label {
  border-color: var(--_form---error-color) !important;
  background-color: rgba(239, 68, 68, 0.05) !important;
  animation: shake 0.5s ease-in-out;
}

.privacy-policy.error::after {
  content: "Toto pole je povinné";
  display: block;
  color: var(--_form---error-color);
  font-size: 0.875rem;
  margin-top: 0.5rem;
  margin-left: 1rem;
  font-weight: 500;
}

@keyframes shake {
  0%,
  100% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-5px);
  }
  75% {
    transform: translateX(5px);
  }
}

/* Make sure error state is visible */
.privacy-policy.error {
  display: block !important;
  visibility: visible !important;
  opacity: 1 !important;
}

/* Toast Notification Styles */
.toast-container {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  z-index: 9999999;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  pointer-events: none;
}

.toast {
  background-color: white;
  border-left: 4px solid var(--_form---error-color);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 1rem 1.5rem;
  border-radius: 0.5rem;
  min-width: 300px;
  max-width: 400px;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  pointer-events: auto;
  transform: translateX(120%);
  opacity: 0;
}

.toast-icon {
  color: var(--_form---error-color);
  font-size: 1.25rem;
  flex-shrink: 0;
}

.toast-content {
  flex: 1;
}

.toast-title {
  font-weight: 600;
  margin-bottom: 0.25rem;
  color: var(--_form---text-color);
}

.toast-message {
  font-size: 0.875rem;
  color: var(--_form---text-light);
}

.toast-close {
  background: none;
  border: none;
  color: var(--_form---text-light);
  cursor: pointer;
  padding: 0.25rem;
  font-size: 1.25rem;
  line-height: 1;
  opacity: 0.5;
  transition: opacity 0.2s ease;
}

.toast-close:hover {
  opacity: 1;
}

/* Toast Animation */
.toast.show {
  transform: translateX(0);
  opacity: 1;
}

/* Remove error styles from form elements since we're using toast */
.flex-form_input.error,
.flex-form_radio-grid.error,
.flex-form_checkbox-grid.error,
.privacy-policy.error {
  border-color: var(--_form---border-color);
  background-color: transparent;
}

.flex-form_input.error:focus,
.flex-form_radio-grid.error:focus,
.flex-form_checkbox-grid.error:focus,
.privacy-policy.error:focus {
  border-color: var(--_form---accent-color);
}

/* Remove error messages from form elements */
.privacy-policy.error::after {
  display: none;
}

/* Keyboard shortcut styles */
.button-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.keyboard-shortcut {
  display: inline-block;
  padding: 0.25rem 0.5rem;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 0.25rem;
  font-size: 0.75rem;
  font-weight: 500;
  color: var(--_form---text-light);
  opacity: 0.8;
  transition: opacity 0.2s ease;
}

.button-container:hover .keyboard-shortcut {
  opacity: 1;
}

/* Windows keyboard shortcut */
@media (pointer: fine) {
  .keyboard-shortcut {
    content: "Ctrl + ↵";
  }
}
							</style>
						</div>
						<div class="flex-form_header">
							<div class="flex-form_progress">
								<div class="flex-form_progress-line">
									<div class="flex-form_progress-fill"></div>
								</div>
								<div data-step="1" class="flex-form_step active">
									<div class="flex-form_step-number"><span>01</span></div>
									<div class="flex-form_step-text"><span>Služby</span></div>
								</div>
								<div data-step="2" class="flex-form_step">
									<div class="flex-form_step-number"><span>02</span></div>
									<div class="flex-form_step-text"><span>Projekt</span></div>
								</div>
								<div data-step="3" class="flex-form_step">
									<div class="flex-form_step-number"><span>03</span></div>
									<div class="flex-form_step-text"><span>Rozpočet</span></div>
								</div>
								<div data-step="4" class="flex-form_step">
									<div class="flex-form_step-number"><span>04</span></div>
									<div class="flex-form_step-text"><span>Čas</span></div>
								</div>
								<div data-step="5" class="flex-form_step">
									<div class="flex-form_step-number"><span>05</span></div>
									<div class="flex-form_step-text"><span>Kontakt</span></div>
								</div>
							</div>
						</div>
						<form id="flex-form">
							<div class="flex-form_content">
								<div data-step="1" class="flex-form_page active active">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Služby</h2>
										<p class="flex-form_description">Vyberte prosím služby, o které máte zájem.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_checkbox-grid">
												<div class="flex-form_checkbox"><input type="checkbox" id="website" name="service" value="Webové stránky"><label for="website" class="flex-form_checkbox-label">Webové stránky</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="branding" name="service" value="Branding"><label for="branding" class="flex-form_checkbox-label">Branding</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="ecommerce" name="service" value="E-shop"><label for="ecommerce" class="flex-form_checkbox-label">E-shop</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="product-design" name="service" value="Design produktu"><label for="product-design" class="flex-form_checkbox-label">Design produktu</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="branding-website" name="service" value="Branding a web"><label for="branding-website" class="flex-form_checkbox-label">Branding a web</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="flex-form_btn_empty"></div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="2" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Projekt</h2>
										<p class="flex-form_description">Rádi bychom se dozvěděli více o vašem projektu.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content"><textarea id="project-info" name="project-info" placeholder="Popište svůj vysněný projekt! Nadchněte nás*" required class="flex-form_input"></textarea></div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="3" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Rozpočet</h2>
										<p class="flex-form_description">Jaký máte v plánu rozpočet na tento projekt?</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_radio-grid">
												<div class="flex-form_radio"><input type="radio" id="budget-1" name="budget" required value="50 000 - 100 000 Kč"><label for="budget-1" class="flex-form_radio-label">50 000 - 100 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-2" name="budget" required value="100 000 - 150 000 Kč"><label for="budget-2" class="flex-form_radio-label">100 000 - 150 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-3" name="budget" required value="150 000 - 200 000 Kč"><label for="budget-3" class="flex-form_radio-label">150 000 - 200 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-4" name="budget" required value="200 000 - 300 000 Kč"><label for="budget-4" class="flex-form_radio-label">200 000 - 300 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-5" name="budget" required value="300 000 - 450 000 Kč"><label for="budget-5" class="flex-form_radio-label">300 000 - 450 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-6" name="budget" required value="Neomezený"><label for="budget-6" class="flex-form_radio-label">Neomezený</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="4" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Časový rámec</h2>
										<p class="flex-form_description">Pracujete s konkrétním časovým harmonogramem?</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_radio-grid">
												<div class="flex-form_radio"><input type="radio" id="timeframe-1" name="timeframe" required value="1 měsíc"><label for="timeframe-1" class="flex-form_radio-label">1 měsíc</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-2" name="timeframe" required value="2-3 měsíce"><label for="timeframe-2" class="flex-form_radio-label">2-3 měsíce</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-3" name="timeframe" required value="3-6 měsíců"><label for="timeframe-3" class="flex-form_radio-label">3-6 měsíců</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-4" name="timeframe" required value="Kdykoli"><label for="timeframe-4" class="flex-form_radio-label">Kdykoli</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="5" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Kontaktní údaje</h2>
										<p class="flex-form_description">Potřebujeme vaše kontaktní údaje, abychom se mohli spojit.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_input-grid">
												<div><input type="text" id="name" name="name" placeholder="Jméno*" required autocomplete="name" class="flex-form_input"></div>
												<div><input type="email" id="email" name="email" placeholder="E-mail*" required autocomplete="email" class="flex-form_input"></div>
												<div><input type="tel" id="phone" name="phone" placeholder="Telefon" autocomplete="tel" pattern="^\+?[1-9]\d{1,14}$" class="flex-form_input"></div>
											</div>
										</div>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_checkbox privacy-policy privacy-policy"><input type="checkbox" id="privacy-policy" name="privacy-policy" required><label for="privacy-policy" class="flex-form_checkbox-label"><span>Souhlasím se zpracováním osobních údajů v souladu s</span><a href="/privacy-policy" target="_blank">ochranou osobních údajů</a><span>*</span></label></div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="submit" id="submit-button" class="flex-form_btn flex-form_btn-submit">Odeslat</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<div id="success-message" class="flex-form_result">
							<div class="flex-form_success">
								<div class="flex-form_success-icon"><span>✓</span></div>
								<h3>Děkujeme! Váš formulář byl úspěšně odeslán!</h3>
								<p>Budeme vás brzy kontaktovat.</p>
							</div>
						</div>
						<div id="error-message" class="flex-form_result">
							<div class="flex-form_error">
								<h3>Něco se pokazilo!</h3>
								<p><span>Zkuste to prosím znovu nebo nás</span><a href="mailto:contact@example.com">kontaktujte přímo e-mailem</a><span>.</span></p>
							</div>
						</div>
						<div class="toast-container"></div>
					</div>
				</main>
			</div>
		</div>
		
		
		
	
<!-- FOOTER CODE --><?php get_template_part("footer_block", ""); ?>
</body>
</html>
