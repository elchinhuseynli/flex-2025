// Wait for DOM to be ready
document.addEventListener("DOMContentLoaded", function () {
  // Register ScrollTrigger plugin
  gsap.registerPlugin(ScrollTrigger);

  // Get elements
  const nextProject = document.querySelector(".next-project-section");

  // Check if element exists
  if (!nextProject) {
    console.warn("Next project section not found");
    return;
  }

  const nextUrl = nextProject.getAttribute("data-next-url");
  const imageContainer = nextProject.querySelector(
    ".next-project-image-container"
  );
  const image = nextProject.querySelector(".next-project-image");
  const overlay = nextProject.querySelector(".next-project-overlay");
  const progressBar = nextProject.querySelector(".progress-bar");
  const progressText = nextProject.querySelector(".progress-text");
  const nextLink = nextProject.querySelector("#nextProjectLink");

  let hasNavigated = false;

  // Create a timeline for the animation
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: nextProject,
      start: "top top",
      end: "bottom top",
      scrub: 0.5,
      pin: true,
      pinSpacing: true,
      anticipatePin: 1,
      onUpdate: (self) => {
        // Update progress bar using scale instead of width
        const progress = self.progress;
        gsap.set(progressBar, {
          scaleX: progress,
          transformOrigin: "left center",
        });
        progressText.textContent = `${Math.floor(progress * 100)}%`;

        // If progress reaches 95% and hasn't navigated yet, trigger navigation
        if (progress >= 1 && !hasNavigated) {
          hasNavigated = true;

          // Add a delay before navigation
          setTimeout(() => {
            // Try multiple navigation methods
            try {
              // Method 1: Use the link click
              if (nextLink) {
                nextLink.click();
              } else {
                // Method 2: Use window.location
                window.location.href = nextUrl;
              }
            } catch (error) {
              // Method 3: Fallback to form submission
              const form = document.createElement("form");
              form.method = "GET";
              form.action = nextUrl;
              document.body.appendChild(form);
              form.submit();
            }
          }, 1000); // 1000ms delay before navigation
        }
      },
    },
  });

  // Add animations to the timeline
  tl.fromTo(
    imageContainer,
    {
      scale: 0.6,
      clipPath: "circle(40% at 50% 50%)",
    },
    {
      scale: 2,
      clipPath: "circle(50% at 50% 50%)",
      ease: "none",
    }
  )
    .fromTo(
      image,
      {
        opacity: 0.8,
      },
      {
        opacity: 1,
        ease: "none",
      },
      0
    )
    .fromTo(
      overlay,
      {
        opacity: 0.8,
      },
      {
        opacity: 1,
        ease: "none",
      },
      0
    );
});
