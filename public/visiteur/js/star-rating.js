// Star Rating System Functionality
document.addEventListener("DOMContentLoaded", () => {
  // Initialize all star rating components
  const starRatings = document.querySelectorAll(".star-rating")

  starRatings.forEach((container) => {
    const isInteractive = container.classList.contains("interactive")
    const starsContainer = container.querySelector(".star-rating-stars")
    const displayContainer = container.querySelector(".star-rating-display")
    const inputContainer = container.querySelector(".star-rating-input")
    const ratingValue = container.querySelector(".star-rating-value")
    const ratingCount = container.querySelector(".star-rating-count")
    const ratingLabel = container.querySelector(".star-rating-label")

    // Skip if missing required elements
    if (!starsContainer || (!displayContainer && !inputContainer)) return

    // For display-only ratings
    if (displayContainer) {
      const rating = Number.parseFloat(container.getAttribute("data-rating") || "0")
      const maxRating = Number.parseInt(container.getAttribute("data-max-rating") || "5")

      // Create stars based on rating
      displayContainer.innerHTML = ""

      for (let i = 1; i <= maxRating; i++) {
        const star = document.createElement("span")
        star.className = "star-rating-star"

        if (i <= Math.floor(rating)) {
          star.className += " filled"
          star.textContent = "★"
        } else if (i - 0.5 <= rating) {
          star.className += " half-filled"
          star.textContent = "☆"
        } else {
          star.textContent = "☆"
        }

        displayContainer.appendChild(star)
      }

      // Update count if available
      if (ratingCount) {
        const count = container.getAttribute("data-count") || "0"
        ratingCount.textContent = `(${count})`
      }

      // Update label if available
      if (ratingLabel) {
        const labels = ["Non évalué", "Mauvais", "Moyen", "Bon", "Très bon", "Excellent"]

        const labelIndex = Math.round(rating)
        ratingLabel.textContent = labels[labelIndex] || ""
      }
    }

    // For interactive ratings
    if (inputContainer && isInteractive) {
      const maxRating = Number.parseInt(container.getAttribute("data-max-rating") || "5")
      const initialRating = Number.parseInt(container.getAttribute("data-initial-rating") || "0")

      // Create interactive stars
      inputContainer.innerHTML = ""

      for (let i = maxRating; i >= 1; i--) {
        const star = document.createElement("span")
        star.className = "star-rating-star"
        star.textContent = "☆"
        star.setAttribute("data-value", i)

        if (i <= initialRating) {
          star.className += " filled"
          star.textContent = "★"
        }

        star.addEventListener("click", function () {
          const value = Number.parseInt(this.getAttribute("data-value"))
          updateRating(value)
          submitRating(value)
        })

        inputContainer.appendChild(star)
      }

      // Function to update visual state
      function updateRating(value) {
        const stars = inputContainer.querySelectorAll(".star-rating-star")

        stars.forEach((star) => {
          const starValue = Number.parseInt(star.getAttribute("data-value"))

          if (starValue <= value) {
            star.className = "star-rating-star filled"
            star.textContent = "★"
          } else {
            star.className = "star-rating-star"
            star.textContent = "☆"
          }
        })

        // Update hidden input if exists
        if (ratingValue) {
          ratingValue.value = value
        }

        // Update label if exists
        if (ratingLabel) {
          const labels = ["Non évalué", "Mauvais", "Moyen", "Bon", "Très bon", "Excellent"]

          ratingLabel.textContent = labels[value] || ""
        }
      }

      // Function to submit rating
      function submitRating(value) {
        // Add submission animation
        container.classList.add("star-rating-submitted")

        setTimeout(() => {
          container.classList.remove("star-rating-submitted")
        }, 600)

        // Here you would typically send the rating to your backend
        console.log(`Rating submitted: ${value}`)

        // For demo purposes, update the count
        if (ratingCount) {
          const currentCount = Number.parseInt(ratingCount.textContent.replace(/[()]/g, "") || "0")
          ratingCount.textContent = `(${currentCount + 1})`
        }
      }
    }
  })

  // Initialize rating breakdowns if they exist
  const ratingBreakdowns = document.querySelectorAll(".star-rating-breakdown")

  ratingBreakdowns.forEach((breakdown) => {
    const items = breakdown.querySelectorAll(".star-rating-breakdown-item")

    items.forEach((item) => {
      const fillEl = item.querySelector(".star-rating-breakdown-fill")
      const percentage = item.getAttribute("data-percentage") || "0"

      if (fillEl) {
        fillEl.style.width = `${percentage}%`
      }
    })
  })
})

