// Advanced Filters Functionality
document.addEventListener("DOMContentLoaded", () => {
  // Initialize filters toggle
  const filtersToggle = document.querySelector(".filters-toggle")
  const filtersContainer = document.querySelector(".filters-container")

  if (filtersToggle && filtersContainer) {
    filtersToggle.addEventListener("click", () => {
      const isExpanded = filtersToggle.classList.contains("expanded")

      if (isExpanded) {
        filtersToggle.classList.remove("expanded")
        filtersContainer.classList.remove("expanded")
        filtersContainer.classList.add("collapsed")
      } else {
        filtersToggle.classList.add("expanded")
        filtersContainer.classList.add("expanded")
        filtersContainer.classList.remove("collapsed")
      }
    })
  }

  // Handle filter form submission
  const filterForm = document.getElementById("content-filters")
  if (filterForm) {
    filterForm.addEventListener("submit", (e) => {
      e.preventDefault()

      // Collect all filter values
      const formData = new FormData(filterForm)
      const filters = {}

      for (const [key, value] of formData.entries()) {
        if (!filters[key]) {
          filters[key] = []
        }

        if (value) {
          filters[key].push(value)
        }
      }

      // Get range slider values
      const durationRange = document.getElementById("duration-range")
      if (durationRange) {
        filters.duration = durationRange.value
      }

      // Display active filters
      displayActiveFilters(filters)

      // Here you would typically call a function to filter the content
      // For now, we'll just log the filters
      console.log("Applied filters:", filters)

      // Close the filters panel on mobile
      if (window.innerWidth < 768) {
        filtersToggle.click()
      }
    })
  }

  // Handle filter reset
  const resetFiltersBtn = document.getElementById("reset-filters")
  if (resetFiltersBtn && filterForm) {
    resetFiltersBtn.addEventListener("click", () => {
      filterForm.reset()

      // Reset range sliders
      const rangeInputs = filterForm.querySelectorAll('input[type="range"]')
      rangeInputs.forEach((input) => {
        const defaultValue = input.getAttribute("data-default") || input.getAttribute("value")
        input.value = defaultValue

        // Update range display if exists
        const displayEl = document.getElementById(`${input.id}-value`)
        if (displayEl) {
          displayEl.textContent = defaultValue
        }
      })

      // Clear active filters display
      const activeFiltersEl = document.querySelector(".active-filters")
      if (activeFiltersEl) {
        activeFiltersEl.innerHTML = ""
        activeFiltersEl.style.display = "none"
      }
    })
  }

  // Initialize range sliders
  const rangeInputs = document.querySelectorAll('input[type="range"]')
  rangeInputs.forEach((input) => {
    const displayEl = document.getElementById(`${input.id}-value`)

    if (displayEl) {
      // Set initial value
      displayEl.textContent = input.value

      // Update on change
      input.addEventListener("input", () => {
        displayEl.textContent = input.value
      })
    }
  })

  // Function to display active filters
  function displayActiveFilters(filters) {
    const activeFiltersEl = document.querySelector(".active-filters")
    if (!activeFiltersEl) return

    // Clear previous filters
    activeFiltersEl.innerHTML = ""

    let hasActiveFilters = false

    // Create filter tags
    for (const [key, values] of Object.entries(filters)) {
      if (Array.isArray(values) && values.length > 0) {
        values.forEach((value) => {
          if (value) {
            hasActiveFilters = true
            const filterLabel = getFilterLabel(key, value)

            const tag = document.createElement("div")
            tag.className = "filter-tag"
            tag.innerHTML = `
              ${filterLabel}
              <span class="filter-tag-remove" data-filter-key="${key}" data-filter-value="${value}">&times;</span>
            `

            activeFiltersEl.appendChild(tag)
          }
        })
      } else if (values && key !== "duration") {
        hasActiveFilters = true
        const filterLabel = getFilterLabel(key, values)

        const tag = document.createElement("div")
        tag.className = "filter-tag"
        tag.innerHTML = `
          ${filterLabel}
          <span class="filter-tag-remove" data-filter-key="${key}" data-filter-value="${values}">&times;</span>
        `

        activeFiltersEl.appendChild(tag)
      }
    }

    // Show/hide the active filters section
    activeFiltersEl.style.display = hasActiveFilters ? "flex" : "none"

    // Add event listeners to remove buttons
    const removeButtons = activeFiltersEl.querySelectorAll(".filter-tag-remove")
    removeButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const key = this.getAttribute("data-filter-key")
        const value = this.getAttribute("data-filter-value")

        // Remove the filter from the form
        const input = filterForm.querySelector(`input[name="${key}"][value="${value}"]`)
        if (input && input.type === "checkbox") {
          input.checked = false
        }

        // Remove the tag
        this.parentElement.remove()

        // Hide the section if no more filters
        if (activeFiltersEl.children.length === 0) {
          activeFiltersEl.style.display = "none"
        }
      })
    })
  }

  // Helper function to get human-readable filter labels
  function getFilterLabel(key, value) {
    // You would customize this based on your filter structure
    const filterLabels = {
      category: "Catégorie",
      duration: "Durée",
      level: "Niveau",
      language: "Langue",
      date: "Date",
      format: "Format",
      // Add more mappings as needed
    }

    const valueLabels = {
      beginner: "Débutant",
      intermediate: "Intermédiaire",
      advanced: "Avancé",
      fr: "Français",
      en: "Anglais",
      // Add more mappings as needed
    }

    const keyLabel = filterLabels[key] || key
    const valueLabel = valueLabels[value] || value

    return `${keyLabel}: ${valueLabel}`
  }
})

