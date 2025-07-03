const glowContainers = document.querySelectorAll("[data-glow-container]");

const glowEffectConfig = {
  proximity: 40,
  spread: 60,
  blur: 20,
  opacity: 0,
};

document.body.addEventListener("pointermove", (event) => {
  glowContainers.forEach((container) => {
    const cards = container.querySelectorAll("[data-glow-element]");
    for (const card of cards) {
      const card_bounds = card.getBoundingClientRect();
      if (
        event.x > card_bounds.left - glowEffectConfig.proximity &&
        event.x <
          card_bounds.left + card_bounds.width + glowEffectConfig.proximity &&
        event.y > card_bounds.top - glowEffectConfig.proximity &&
        event.y <
          card_bounds.top + card_bounds.height + glowEffectConfig.proximity
      ) {
        card.style.setProperty("--active", 1);
      } else {
        card.style.setProperty("--active", glowEffectConfig.opacity);
      }

      const card_center = [
        card_bounds.left + card_bounds.width * 0.5,
        card_bounds.top + card_bounds.height * 0.5,
      ];
      let angle =
        (Math.atan2(event.y - card_center[1], event.x - card_center[0]) * 180) /
        Math.PI;
      angle = angle < 0 ? angle + 360 : angle;
      card.style.setProperty("--start", angle + 90);
    }
  });
});

function restyle() {
  glowContainers.forEach((container) => {
    container.style.setProperty("--blur", glowEffectConfig.blur);
    container.style.setProperty("--spread", glowEffectConfig.spread);
  });
}

restyle();
