// Content Preview Functionality
document.addEventListener("DOMContentLoaded", () => {
  // Select all content cards that should have preview functionality
  const previewableCards = document.querySelectorAll(".previewable")

  previewableCards.forEach((card) => {
    // Get preview data
    const previewData = {
      title: card.getAttribute("data-preview-title") || "",
      description: card.getAttribute("data-preview-description") || "",
      duration: card.getAttribute("data-preview-duration") || "",
      type: card.getAttribute("data-preview-type") || "",
      image: card.getAttribute("data-preview-image") || "",
      preview: card.getAttribute("data-preview-url") || "",
    }

    // Only add hover functionality if we have preview data
    if (previewData.preview || previewData.description) {
      let previewTimeout
      let previewElement = null

      // Mouse enter - show preview after a short delay
      card.addEventListener("mouseenter", (e) => {
        previewTimeout = setTimeout(() => {
          // Create preview element if it doesn't exist
          if (!previewElement) {
            previewElement = createPreviewElement(previewData)
            document.body.appendChild(previewElement)
          }

          // Position the preview
          positionPreviewElement(previewElement, card)

          // Show the preview
          previewElement.classList.add("show")

          // Start video preview if available
          const videoPreview = previewElement.querySelector("video")
          if (videoPreview) {
            videoPreview.play().catch((e) => console.log("Preview autoplay prevented:", e))
          }
        }, 500) // 500ms delay before showing preview
      })

      // Mouse leave - hide preview
      card.addEventListener("mouseleave", () => {
        clearTimeout(previewTimeout)
        if (previewElement) {
          previewElement.classList.remove("show")

          // Stop video if playing
          const videoPreview = previewElement.querySelector("video")
          if (videoPreview) {
            videoPreview.pause()
          }
        }
      })
    }
  })

  function createPreviewElement(data) {
    const previewEl = document.createElement("div")
    previewEl.className = "content-preview-popup"

    let previewContent = ""

    // Add video/audio preview if available
    if (data.preview) {
      if (data.type === "video") {
        previewContent += `
          <div class="preview-media">
            <video muted loop>
              <source src="${data.preview}" type="video/mp4">
            </video>
          </div>
        `
      } else if (data.type === "audio") {
        previewContent += `
          <div class="preview-media">
            <div class="audio-preview-placeholder" style="background-image: url('${data.image}')">
              <div class="audio-wave-animation"></div>
            </div>
          </div>
        `
      }
    } else if (data.image) {
      previewContent += `
        <div class="preview-media">
          <img src="${data.image}" alt="${data.title}">
        </div>
      `
    }

    // Add text content
    previewContent += `
      <div class="preview-content">
        <h5>${data.title}</h5>
        <p>${data.description}</p>
        ${data.duration ? `<div class="preview-duration">${data.duration}</div>` : ""}
      </div>
    `

    previewEl.innerHTML = previewContent
    return previewEl
  }

  function positionPreviewElement(el, targetEl) {
    const rect = targetEl.getBoundingClientRect()
    const previewRect = el.getBoundingClientRect()

    // Default position is above the target
    let top = rect.top - previewRect.height - 10
    let left = rect.left + rect.width / 2 - previewRect.width / 2

    // If there's not enough space above, position it below
    if (top < 10) {
      top = rect.bottom + 10
    }

    // Make sure it doesn't go off-screen horizontally
    if (left < 10) left = 10
    if (left + previewRect.width > window.innerWidth - 10) {
      left = window.innerWidth - previewRect.width - 10
    }

    el.style.top = `${top + window.scrollY}px`
    el.style.left = `${left}px`
  }
})

