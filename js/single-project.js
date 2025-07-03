// fancybox data-fancybox="inline-gallery"

Fancybox.bind("[data-fancybox='inline-gallery']", {
  loop: true,
  buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
  animationEffect: "fade",
  transitionEffect: "fade",
  thumbs: {
    autoStart: false,
  },
});
