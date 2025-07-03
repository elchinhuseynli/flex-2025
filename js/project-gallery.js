/**
 * Project Gallery JavaScript
 * Handles Fancybox lightbox and video management for the project gallery
 */

// Fancybox configuration
Fancybox.bind("[data-fancybox='images']", {
  loop: true,
  buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
  animationEffect: "fade",
  transitionEffect: "fade",
  thumbs: {
    autoStart: false,
  },
  Html: {
    video: {
      autoplay: false,
      controls: true,
    },
  },
  on: {
    reveal: () => pauseAllVideos(),
  },
});

/**
 * Pause all gallery videos
 */
function pauseAllVideos() {
  const videos = document.querySelectorAll("video");
  videos.forEach((video) => {
    if (!video.paused) {
      video.pause();
    }
  });
}

/**
 * Resume autoplay videos when page becomes visible
 */
function resumeAutoplayVideos() {
  const videos = document.querySelectorAll(".project-gallery-video video");
  videos.forEach((video) => {
    if (video.paused && video.autoplay) {
      video.play().catch(() => {
        // Ignore autoplay errors (browser restrictions)
      });
    }
  });
}

// Handle page visibility changes
document.addEventListener("visibilitychange", () => {
  if (document.hidden) {
    pauseAllVideos();
  } else {
    resumeAutoplayVideos();
  }
});

/**
 * Handle image loading states
 */
function handleImageLoading() {
  const galleryImages = document.querySelectorAll(".project-gallery-image");

  galleryImages.forEach((img) => {
    const galleryItem = img.closest(".project-gallery-item");

    if (img.complete) {
      // Image already loaded
      galleryItem.classList.add("loaded");
    } else {
      // Image still loading
      img.addEventListener("load", () => {
        galleryItem.classList.add("loaded");
      });

      img.addEventListener("error", () => {
        // Handle image load error
        galleryItem.classList.add("loaded");
        console.warn("Failed to load image:", img.src);
      });
    }
  });
}

// Initialize image loading handlers when DOM is ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", handleImageLoading);
} else {
  handleImageLoading();
}
