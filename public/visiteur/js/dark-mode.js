document.addEventListener("DOMContentLoaded", () => {
    // Déclarez la variable au début
    const themeToggles = document.querySelectorAll(".theme-toggle");

    // Check for saved theme preference or use preferred color scheme
    const savedTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

    // Set initial theme
    if (savedTheme) {
      document.documentElement.setAttribute("data-theme", savedTheme);
      updateThemeToggle(savedTheme);
    } else if (prefersDark) {
      document.documentElement.setAttribute("data-theme", "dark");
      updateThemeToggle("dark");
    }

    // Add event listener to theme toggle buttons
    themeToggles.forEach((toggle) => {
      toggle.addEventListener("click", () => {
        const currentTheme = document.documentElement.getAttribute("data-theme") || "light";
        const newTheme = currentTheme === "light" ? "dark" : "light";

        // Update theme
        document.documentElement.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);

        // Update all toggle buttons
        updateAllThemeToggles(newTheme);

        console.log("Theme switched to:", newTheme); // Debug log
      });
    });

    function updateAllThemeToggles(theme) {
      themeToggles.forEach((toggle) => updateThemeToggle(theme, toggle));
    }

    function updateThemeToggle(theme, toggle = null) {
      const toggles = toggle ? [toggle] : themeToggles;

      toggles.forEach((toggle) => {
        if (!toggle) return;

        const sunIcon = toggle.querySelector(".sun-icon");
        const moonIcon = toggle.querySelector(".moon-icon");

        if (sunIcon && moonIcon) {
          if (theme === "dark") {
            sunIcon.classList.add("d-none");
            moonIcon.classList.remove("d-none");
          } else {
            sunIcon.classList.remove("d-none");
            moonIcon.classList.add("d-none");
          }
        }
      });
    }

    // Listen for system preference changes
    window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (e) => {
      if (!localStorage.getItem("theme")) {
        const newTheme = e.matches ? "dark" : "light";
        document.documentElement.setAttribute("data-theme", newTheme);
        updateAllThemeToggles(newTheme);
      }
    });

    // Debug log
    console.log("Dark mode script loaded");
    console.log("Current theme:", document.documentElement.getAttribute("data-theme"));
    console.log("Theme toggles found:", themeToggles.length);
  });
