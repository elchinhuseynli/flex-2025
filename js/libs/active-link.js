// /**
//  * Active Link Detection for Webflow
//  * Handles both URL-based and scroll-based active states for navigation links
//  * Compatible with sticky navigation
//  * @version 1.0.0
//  * @author Your Team
//  */

// (function () {
//   "use strict";

//   class ActiveLinkDetector {
//     constructor(options = {}) {
//       this.options = {
//         activeClass: "w--current",
//         offset: 100,
//         throttleDelay: 16,
//         ...options,
//       };

//       this.links = [];
//       this.sections = new Map();
//       this.throttleTimer = null;
//       this.isInitialized = false;

//       this.init();
//     }

//     init() {
//       if (this.isInitialized) return;

//       this.collectLinksAndSections();
//       this.updateActiveLink();
//       this.bindEvents();
//       this.isInitialized = true;
//     }

//     collectLinksAndSections() {
//       this.links = Array.from(document.querySelectorAll("a[href]"));
//       this.sections.clear();

//       this.links.forEach((link) => {
//         const href = link.getAttribute("href");
//         if (href && href.startsWith("#") && href.length > 1) {
//           const targetId = href.substring(1);
//           const targetElement = document.getElementById(targetId);
//           if (targetElement) {
//             this.sections.set(href, {
//               link: link,
//               element: targetElement,
//               id: targetId,
//             });
//           }
//         }
//       });
//     }

//     updateActiveLink() {
//       const currentPath =
//         window.location.pathname +
//         window.location.search +
//         window.location.hash;

//       // Remove all active classes
//       this.links.forEach((link) => {
//         link.classList.remove(this.options.activeClass);
//       });

//       // Handle scroll spy for anchor sections
//       const scrollActiveSection = this.getActiveSectionByScroll();
//       if (scrollActiveSection) {
//         scrollActiveSection.link.classList.add(this.options.activeClass);

//         // If hash matches, we're done
//         if (
//           window.location.hash &&
//           window.location.hash === scrollActiveSection.link.getAttribute("href")
//         ) {
//           return;
//         }
//       }

//       // Handle regular URL matching
//       this.links.forEach((link) => {
//         const href = link.getAttribute("href");

//         if (
//           this.isExternalLink(href) ||
//           link.classList.contains(this.options.activeClass)
//         ) {
//           return;
//         }

//         if (this.isLinkActive(href, currentPath)) {
//           link.classList.add(this.options.activeClass);
//         }
//       });
//     }

//     isExternalLink(href) {
//       return (
//         href && (href.startsWith("http://") || href.startsWith("https://"))
//       );
//     }

//     isLinkActive(href, currentPath) {
//       if (!href) return false;

//       // Handle hash links
//       if (href.startsWith("#")) {
//         return window.location.hash === href;
//       }

//       const currentPathNoHash =
//         window.location.pathname + window.location.search;
//       const currentPathWithHash = currentPathNoHash + window.location.hash;

//       // Exact matches
//       if (
//         href === currentPath ||
//         href === currentPathWithHash ||
//         href === currentPathNoHash
//       ) {
//         return true;
//       }

//       // Root path
//       if (href === "/" && window.location.pathname === "/") {
//         return true;
//       }

//       // Relative paths
//       if (href === window.location.pathname) {
//         return true;
//       }

//       return false;
//     }

//     getActiveSectionByScroll() {
//       if (this.sections.size === 0) return null;

//       const scrollTop =
//         window.pageYOffset || document.documentElement.scrollTop;
//       const windowHeight = window.innerHeight;

//       let activeSection = null;
//       let bestScore = -1;

//       this.sections.forEach((section) => {
//         const element = section.element;
//         const rect = element.getBoundingClientRect();
//         const elementTop = rect.top + scrollTop;
//         const elementBottom = elementTop + rect.height;

//         // Calculate visibility
//         const visibleTop = Math.max(elementTop, scrollTop);
//         const visibleBottom = Math.min(elementBottom, scrollTop + windowHeight);
//         const visibleHeight = Math.max(0, visibleBottom - visibleTop);
//         const visibilityRatio = visibleHeight / rect.height;

//         // Distance from offset point
//         const distanceFromOffset = Math.abs(
//           elementTop - (scrollTop + this.options.offset)
//         );

//         // Calculate score
//         let score = 0;

//         if (visibilityRatio > 0.3) {
//           score = visibilityRatio * 100;
//         }

//         if (
//           elementTop <= scrollTop + this.options.offset &&
//           elementBottom >= scrollTop + this.options.offset
//         ) {
//           score += 50;
//         }

//         score -= distanceFromOffset / 10;

//         if (score > bestScore) {
//           bestScore = score;
//           activeSection = section;
//         }
//       });

//       return activeSection;
//     }

//     handleScroll() {
//       if (!this.throttleTimer) {
//         this.throttleTimer = setTimeout(() => {
//           this.updateActiveLink();
//           this.throttleTimer = null;
//         }, this.options.throttleDelay);
//       }
//     }

//     bindEvents() {
//       // URL change events
//       window.addEventListener("hashchange", () => this.updateActiveLink());
//       window.addEventListener("popstate", () => this.updateActiveLink());

//       // Scroll events
//       window.addEventListener("scroll", () => this.handleScroll(), {
//         passive: true,
//       });

//       // Anchor link clicks
//       this.links.forEach((link) => {
//         const href = link.getAttribute("href");
//         if (href && href.startsWith("#")) {
//           link.addEventListener("click", () => {
//             setTimeout(() => this.updateActiveLink(), 10);
//           });
//         }
//       });

//       // Dynamic content observer
//       const observer = new MutationObserver((mutations) => {
//         let shouldUpdate = false;
//         mutations.forEach((mutation) => {
//           if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
//             for (let node of mutation.addedNodes) {
//               if (
//                 node.nodeType === 1 &&
//                 (node.tagName === "A" || node.querySelector("a"))
//               ) {
//                 shouldUpdate = true;
//                 break;
//               }
//             }
//           }
//         });

//         if (shouldUpdate) {
//           this.refresh();
//         }
//       });

//       observer.observe(document.body, {
//         childList: true,
//         subtree: true,
//       });
//     }

//     refresh() {
//       this.collectLinksAndSections();
//       this.updateActiveLink();
//     }

//     destroy() {
//       if (this.throttleTimer) {
//         clearTimeout(this.throttleTimer);
//         this.throttleTimer = null;
//       }
//       this.isInitialized = false;
//     }
//   }

//   // Initialize when DOM is ready
//   function initActiveLinks() {
//     // Prevent multiple initializations
//     if (window.activeLinkDetector) {
//       return;
//     }

//     try {
//       const detector = new ActiveLinkDetector({
//         activeClass: "w--current",
//         offset: 100, // Adjust based on your sticky nav height
//         throttleDelay: 16,
//       });

//       // Store globally for potential manual control
//       window.activeLinkDetector = detector;
//     } catch (error) {
//       console.error("ActiveLinkDetector initialization failed:", error);
//     }
//   }

//   // Auto-initialize based on document state
//   if (document.readyState === "loading") {
//     document.addEventListener("DOMContentLoaded", initActiveLinks);
//   } else {
//     // DOM already loaded, initialize with small delay for safety
//     setTimeout(initActiveLinks, 50);
//   }

//   // Expose refresh method for manual control if needed
//   window.refreshActiveLinks = function () {
//     if (window.activeLinkDetector) {
//       window.activeLinkDetector.refresh();
//     }
//   };
// })();
