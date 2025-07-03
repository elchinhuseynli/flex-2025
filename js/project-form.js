document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("flex-form");

  const formPages = document.querySelectorAll(".flex-form_page");
  const progressSteps = document.querySelectorAll(".flex-form_step");
  const nextButtons = document.querySelectorAll(".flex-form_btn-next");
  const prevButtons = document.querySelectorAll(".flex-form_btn-prev");
  const submitButton = document.querySelector(".flex-form_btn-submit");
  const successMessage = document.getElementById("success-message");
  const errorMessage = document.getElementById("error-message");
  const toastContainer = document.querySelector(".toast-container");

  // Toast notification function
  function showToast(title, message) {
    const toast = document.createElement("div");
    toast.className = "toast";
    toast.innerHTML = `
        <div class="toast-icon">⚠️</div>
        <div class="toast-content">
          <div class="toast-title">${title}</div>
          <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close">&times;</button>
      `;

    toastContainer.appendChild(toast);

    // Animate in
    gsap.to(toast, {
      x: 0,
      opacity: 1,
      duration: 0.3,
      ease: "power2.out",
    });

    // Add close button functionality
    const closeButton = toast.querySelector(".toast-close");
    closeButton.addEventListener("click", () => {
      gsap.to(toast, {
        x: "120%",
        opacity: 0,
        duration: 0.3,
        ease: "power2.in",
        onComplete: () => toast.remove(),
      });
    });

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (toast.parentElement) {
        gsap.to(toast, {
          x: "120%",
          opacity: 0,
          duration: 0.3,
          ease: "power2.in",
          onComplete: () => toast.remove(),
        });
      }
    }, 5000);
  }

  // Set keyboard shortcut text based on OS
  const isMac = navigator.platform.toUpperCase().indexOf("MAC") >= 0;
  const shortcutText = isMac ? "⌘ + ↵" : "Ctrl + ↵";
  const backShortcutText = isMac ? "⌘ + [" : "Ctrl + [";
  document.querySelectorAll(".keyboard-shortcut").forEach((el) => {
    // Check if this is a back button shortcut
    if (el.closest(".button-container").querySelector(".flex-form_btn-prev")) {
      el.textContent = backShortcutText;
    } else {
      el.textContent = shortcutText;
    }
  });

  // Initialize GSAP animations
  gsap.registerPlugin(ScrollTrigger);

  // Initialize form
  let currentStep = 1;
  updateForm();

  // Function to validate current step
  function validateCurrentStep() {
    const currentPage = document.querySelector(
      `.flex-form_page[data-step="${currentStep}"]`
    );
    let isValid = true;
    let errorMessage = "";

    // Step 1: Services validation
    if (currentStep === 1) {
      const checkboxes = currentPage.querySelectorAll('input[type="checkbox"]');
      const isChecked = Array.from(checkboxes).some(
        (checkbox) => checkbox.checked
      );

      if (!isChecked) {
        isValid = false;
        checkboxes[0]
          .closest(".flex-form_checkbox-grid")
          .classList.add("error");
        errorMessage = "Prosím vyberte alespoň jednu službu.";
      } else {
        checkboxes[0]
          .closest(".flex-form_checkbox-grid")
          .classList.remove("error");
      }
    }

    // Step 2: Project info validation
    if (currentStep === 2) {
      const textarea = currentPage.querySelector("textarea[required]");
      if (!textarea.value.trim()) {
        isValid = false;
        textarea.classList.add("error");
        errorMessage = "Prosím popište svůj projekt.";
      } else {
        textarea.classList.remove("error");
      }
    }

    // Step 3: Budget validation
    if (currentStep === 3) {
      const radioGroup = currentPage.querySelectorAll(
        'input[type="radio"][name="budget"]'
      );
      const isChecked = Array.from(radioGroup).some((radio) => radio.checked);

      if (!isChecked) {
        isValid = false;
        radioGroup[0].closest(".flex-form_radio-grid").classList.add("error");
        errorMessage = "Prosím vyberte rozpočet.";
      } else {
        radioGroup[0]
          .closest(".flex-form_radio-grid")
          .classList.remove("error");
      }
    }

    // Step 4: Timeframe validation
    if (currentStep === 4) {
      const radioGroup = currentPage.querySelectorAll(
        'input[type="radio"][name="timeframe"]'
      );
      const isChecked = Array.from(radioGroup).some((radio) => radio.checked);

      if (!isChecked) {
        isValid = false;
        radioGroup[0].closest(".flex-form_radio-grid").classList.add("error");
        errorMessage = "Prosím vyberte časový rámec.";
      } else {
        radioGroup[0]
          .closest(".flex-form_radio-grid")
          .classList.remove("error");
      }
    }

    // Step 5: Contact details validation
    if (currentStep === 5) {
      const nameInput = currentPage.querySelector('input[name="name"]');
      const emailInput = currentPage.querySelector('input[name="email"]');
      const privacyCheckbox = currentPage.querySelector("#privacy-policy");

      if (!nameInput.value.trim()) {
        isValid = false;
        nameInput.classList.add("error");
        errorMessage = "Prosím zadejte své jméno.";
      } else {
        nameInput.classList.remove("error");
      }

      if (!emailInput.value.trim()) {
        isValid = false;
        emailInput.classList.add("error");
        errorMessage = "Prosím zadejte svůj e-mail.";
      } else if (!isValidEmail(emailInput.value)) {
        isValid = false;
        emailInput.classList.add("error");
        errorMessage = "Prosím zadejte platnou e-mailovou adresu.";
      } else {
        emailInput.classList.remove("error");
      }

      if (!privacyCheckbox.checked) {
        isValid = false;
        privacyCheckbox.closest(".privacy-policy").classList.add("error");
        errorMessage = "Prosím souhlaste se zpracováním osobních údajů.";
      } else {
        privacyCheckbox.closest(".privacy-policy").classList.remove("error");
      }
    }

    if (!isValid) {
      showToast("Chyba", errorMessage);
    }

    return isValid;
  }

  // Email validation helper
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Keyboard shortcuts handler
  document.addEventListener("keydown", function (e) {
    // Check if we're on the last step
    const isLastStep = currentStep === formPages.length;

    // Check if we're on the first step
    const isFirstStep = currentStep === 1;

    // CMD+Enter (Mac) or CTRL+Enter (Windows) to go to next step
    if ((e.metaKey || e.ctrlKey) && e.key === "Enter") {
      e.preventDefault();

      if (isLastStep) {
        // If on last step, trigger form submission
        handleFormSubmit(e);
      } else {
        // Validate current step
        if (validateCurrentStep()) {
          currentStep++;
          updateForm();
        }
      }
    }

    // CMD+[ (Mac) or CTRL+[ (Windows) to go back
    if ((e.metaKey || e.ctrlKey) && e.key === "[") {
      e.preventDefault();
      if (!isFirstStep) {
        currentStep--;
        updateForm();
      }
    }
  });

  // Progress step click event - direct navigation
  progressSteps.forEach((step) => {
    step.addEventListener("click", function () {
      const clickedStep = parseInt(this.getAttribute("data-step"));

      // Only allow navigation to previous steps
      if (clickedStep < currentStep) {
        currentStep = clickedStep;
        updateForm();
      }
    });
  });

  // Next button click event
  nextButtons.forEach((button) => {
    button.addEventListener("click", () => {
      if (validateCurrentStep()) {
        currentStep++;
        updateForm();
      }
    });
  });

  // Previous button click event
  prevButtons.forEach((button) => {
    button.addEventListener("click", () => {
      currentStep--;
      updateForm();
    });
  });

  // Handle form submission
  function handleFormSubmit(e) {
    e.preventDefault();

    // Validate final step
    if (validateCurrentStep()) {
      // Show loading state
      submitButton.disabled = true;
      submitButton.textContent = "Odesílám...";

      // Collect form data
      const formData = new FormData(form);
      const formDataObj = {};

      // Handle multiple checkbox values
      const serviceValues = [];
      formData.getAll("service").forEach((value) => {
        serviceValues.push(value);
      });

      // Add all form data to object
      formData.forEach((value, key) => {
        if (key !== "service") {
          formDataObj[key] = value;
        }
      });

      // Add services array
      formDataObj["service"] = serviceValues;

      // Submit to UseBasin
      fetch("https://usebasin.com/f/b1889be7cbcc", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formDataObj),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          // Redirect to thank you page
          window.location.href = "thank-you.html";
        })
        .catch((error) => {
          // Show error message
          showToast(
            "Chyba",
            "Něco se pokazilo. Zkuste to prosím znovu nebo nás kontaktujte přímo e-mailem."
          );
          // Reset button state
          submitButton.disabled = false;
          submitButton.textContent = "Odeslat";
        });
    }
  }

  // Add both form submit and button click handlers
  form.addEventListener("submit", handleFormSubmit);
  submitButton.addEventListener("click", handleFormSubmit);

  // Privacy policy checkbox change handler
  const privacyCheckbox = document.querySelector("#privacy-policy");
  privacyCheckbox.addEventListener("change", function () {
    const privacyContainer = this.closest(".privacy-policy");
    if (this.checked) {
      privacyContainer.classList.remove("error");
    }
  });

  // Update form state
  function updateForm() {
    // Hide all pages
    formPages.forEach((page) => {
      page.classList.remove("active");
    });

    // Reset progress steps
    progressSteps.forEach((step) => {
      step.classList.remove("active");
      step.classList.remove("completed");
      step.classList.remove("inactive");
    });

    // Show current step
    const activePage = document.querySelector(
      `.flex-form_page[data-step="${currentStep}"]`
    );
    if (activePage) {
      activePage.classList.add("active");

      // Animate form elements with GSAP
      const elements = activePage.querySelectorAll(
        ".flex-form_section-header, .flex-form_section"
      );
      gsap.fromTo(
        elements,
        {
          opacity: 0,
          y: 10,
          scale: 0.98,
        },
        {
          opacity: 1,
          y: 0,
          scale: 1,
          duration: 0.8,
          stagger: 0.3,
          ease: "power1.out",
        }
      );

      // Animate progress steps
      const currentStepElement = document.querySelector(
        `.flex-form_step[data-step="${currentStep}"]`
      );
      if (currentStepElement) {
        gsap.fromTo(
          currentStepElement,
          {
            scale: 0.95,
            opacity: 0.8,
          },
          {
            scale: 1,
            opacity: 1,
            duration: 0.3,
            ease: "power1.out",
          }
        );
      }
    }

    // Update progress steps and fill
    const progressFill = document.querySelector(".flex-form_progress-fill");
    const totalSteps = progressSteps.length;
    const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;

    gsap.to(progressFill, {
      width: `${progressPercentage}%`,
      duration: 0.3,
      ease: "power1.out",
    });

    for (let i = 1; i <= progressSteps.length; i++) {
      const step = document.querySelector(`.flex-form_step[data-step="${i}"]`);

      if (i < currentStep) {
        step.classList.add("completed");
      } else if (i === currentStep) {
        step.classList.add("active");
      } else {
        step.classList.add("inactive");
      }
    }
  }

  // Checkbox and radio button click events for better UX
  const checkboxOptions = document.querySelectorAll(
    ".flex-form_checkbox input"
  );
  checkboxOptions.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        this.closest(".flex-form_checkbox").classList.add("selected");
      } else {
        this.closest(".flex-form_checkbox").classList.remove("selected");
      }
    });
  });

  const radioOptions = document.querySelectorAll(".flex-form_radio input");
  radioOptions.forEach((radio) => {
    radio.addEventListener("change", function () {
      if (this.checked) {
        const radioGroup = document.querySelectorAll(
          `input[name="${this.name}"]`
        );
        radioGroup.forEach((radio) => {
          radio.closest(".flex-form_radio").classList.remove("selected");
        });
        this.closest(".flex-form_radio").classList.add("selected");
      }
    });
  });
});
