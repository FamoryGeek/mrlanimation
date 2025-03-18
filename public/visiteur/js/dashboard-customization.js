// Dashboard Customization Functionality
document.addEventListener("DOMContentLoaded", () => {
  // Check if we're on a dashboard page
  const dashboardContainer = document.querySelector(".dashboard-container")
  if (!dashboardContainer) return

  // Get customization elements
  const customizeBtn = document.getElementById("customize-dashboard")
  const saveLayoutBtn = document.getElementById("save-dashboard-layout")
  const resetLayoutBtn = document.getElementById("reset-dashboard-layout")
  const dashboardWidgets = document.querySelectorAll(".dashboard-widget")

  // Initialize dashboard customization
  if (customizeBtn) {
    customizeBtn.addEventListener("click", () => {
      toggleCustomizationMode()
    })
  }

  // Save layout
  if (saveLayoutBtn) {
    saveLayoutBtn.addEventListener("click", () => {
      saveLayout()
      toggleCustomizationMode(false)
    })
  }

  // Reset layout
  if (resetLayoutBtn) {
    resetLayoutBtn.addEventListener("click", () => {
      resetLayout()
      toggleCustomizationMode(false)
    })
  }

  // Toggle customization mode
  function toggleCustomizationMode(enable) {
    const isEnabled = enable !== undefined ? enable : !dashboardContainer.classList.contains("customizing")

    if (isEnabled) {
      dashboardContainer.classList.add("customizing")
      customizeBtn.textContent = "Terminer la personnalisation"

      // Show customization controls
      document.querySelectorAll(".widget-customize-controls").forEach((el) => {
        el.style.display = "flex"
      })

      // Show save/reset buttons
      document.querySelector(".dashboard-customize-actions").style.display = "flex"

      // Make widgets draggable
      initDraggableWidgets()
    } else {
      dashboardContainer.classList.remove("customizing")
      customizeBtn.textContent = "Personnaliser le tableau de bord"

      // Hide customization controls
      document.querySelectorAll(".widget-customize-controls").forEach((el) => {
        el.style.display = "none"
      })

      // Hide save/reset buttons
      document.querySelector(".dashboard-customize-actions").style.display = "none"

      // Disable draggable
      disableDraggableWidgets()
    }
  }

  // Initialize draggable widgets
  function initDraggableWidgets() {
    dashboardWidgets.forEach((widget) => {
      widget.setAttribute("draggable", true)

      widget.addEventListener("dragstart", handleDragStart)
      widget.addEventListener("dragend", handleDragEnd)
    })

    const dropZones = document.querySelectorAll(".dashboard-column")
    dropZones.forEach((zone) => {
      zone.addEventListener("dragover", handleDragOver)
      zone.addEventListener("dragenter", handleDragEnter)
      zone.addEventListener("dragleave", handleDragLeave)
      zone.addEventListener("drop", handleDrop)
    })
  }

  // Disable draggable widgets
  function disableDraggableWidgets() {
    dashboardWidgets.forEach((widget) => {
      widget.removeAttribute("draggable")

      widget.removeEventListener("dragstart", handleDragStart)
      widget.removeEventListener("dragend", handleDragEnd)
    })

    const dropZones = document.querySelectorAll(".dashboard-column")
    dropZones.forEach((zone) => {
      zone.removeEventListener("dragover", handleDragOver)
      zone.removeEventListener("dragenter", handleDragEnter)
      zone.removeEventListener("dragleave", handleDragLeave)
      zone.removeEventListener("drop", handleDrop)
    })
  }

  // Drag and drop handlers
  let draggedWidget = null

  function handleDragStart(e) {
    draggedWidget = this
    e.dataTransfer.effectAllowed = "move"
    e.dataTransfer.setData("text/html", this.outerHTML)
    this.classList.add("dragging")
  }

  function handleDragEnd(e) {
    this.classList.remove("dragging")

    document.querySelectorAll(".dashboard-column").forEach((col) => {
      col.classList.remove("drag-over")
    })
  }

  function handleDragOver(e) {
    e.preventDefault()
    e.dataTransfer.dropEffect = "move"
    return false
  }

  function handleDragEnter(e) {
    this.classList.add("drag-over")
  }

  function handleDragLeave(e) {
    this.classList.remove("drag-over")
  }

  function handleDrop(e) {
    e.preventDefault()

    // Remove drag-over class
    this.classList.remove("drag-over")

    // Don't do anything if dropping the same column
    if (draggedWidget.parentNode === this) return false

    // Remove the dragged element from its original place
    draggedWidget.parentNode.removeChild(draggedWidget)

    // Add it to the new column
    this.appendChild(draggedWidget)

    return false
  }

  // Widget visibility toggle
  document.querySelectorAll(".widget-visibility-toggle").forEach((toggle) => {
    toggle.addEventListener("click", function () {
      const widgetId = this.closest(".dashboard-widget").getAttribute("data-widget-id")
      const isVisible = this.classList.contains("visible")

      if (isVisible) {
        this.classList.remove("visible")
        this.classList.add("hidden")
        this.querySelector("i").className = "bi bi-eye-slash"

        // Hide widget content
        this.closest(".dashboard-widget").classList.add("widget-hidden")
      } else {
        this.classList.remove("hidden")
        this.classList.add("visible")
        this.querySelector("i").className = "bi bi-eye"

        // Show widget content
        this.closest(".dashboard-widget").classList.remove("widget-hidden")
      }

      // Update visibility in user preferences
      updateWidgetVisibility(widgetId, !isVisible)
    })
  })

  // Save layout to localStorage
  function saveLayout() {
    const layout = []

    document.querySelectorAll(".dashboard-column").forEach((column, colIndex) => {
      const columnWidgets = []

      column.querySelectorAll(".dashboard-widget").forEach((widget) => {
        columnWidgets.push({
          id: widget.getAttribute("data-widget-id"),
          visible: !widget.classList.contains("widget-hidden"),
        })
      })

      layout.push(columnWidgets)
    })

    localStorage.setItem("dashboardLayout", JSON.stringify(layout))

    // Show success message
    showNotification("Mise en page sauvegardée avec succès!", "success")
  }

  // Reset layout to default
  function resetLayout() {
    localStorage.removeItem("dashboardLayout")

    // Reload the page to reset the layout
    window.location.reload()
  }

  // Update widget visibility in user preferences
  function updateWidgetVisibility(widgetId, isVisible) {
    // Get current layout
    const layout = JSON.parse(localStorage.getItem("dashboardLayout") || "[]")

    // Find the widget and update its visibility
    let found = false

    for (let i = 0; i < layout.length; i++) {
      for (let j = 0; j < layout[i].length; j++) {
        if (layout[i][j].id === widgetId) {
          layout[i][j].visible = isVisible
          found = true
          break
        }
      }
      if (found) break
    }

    // Save updated layout
    localStorage.setItem("dashboardLayout", JSON.stringify(layout))
  }

  // Load saved layout if exists
  function loadSavedLayout() {
    const savedLayout = localStorage.getItem("dashboardLayout")
    if (!savedLayout) return

    const layout = JSON.parse(savedLayout)

    // Clear all columns
    document.querySelectorAll(".dashboard-column").forEach((column) => {
      column.innerHTML = ""
    })

    // Rebuild layout from saved configuration
    const columns = document.querySelectorAll(".dashboard-column")

    layout.forEach((columnWidgets, colIndex) => {
      if (colIndex >= columns.length) return

      columnWidgets.forEach((widgetData) => {
        const originalWidget = document.querySelector(`.dashboard-widget[data-widget-id="${widgetData.id}"]`)

        if (originalWidget) {
          const widgetClone = originalWidget.cloneNode(true)

          // Set visibility
          if (!widgetData.visible) {
            widgetClone.classList.add("widget-hidden")
            const visibilityToggle = widgetClone.querySelector(".widget-visibility-toggle")
            if (visibilityToggle) {
              visibilityToggle.classList.remove("visible")
              visibilityToggle.classList.add("hidden")
              visibilityToggle.querySelector("i").className = "bi bi-eye-slash"
            }
          }

          columns[colIndex].appendChild(widgetClone)
        }
      })
    })

    // Remove any widgets that weren't in the saved layout
    document.querySelectorAll(".dashboard-widget").forEach((widget) => {
      if (!widget.parentElement.classList.contains("dashboard-column")) {
        widget.remove()
      }
    })
  }

  // Show notification
  function showNotification(message, type = "info") {
    const notification = document.createElement("div")
    notification.className = `dashboard-notification ${type}`
    notification.innerHTML = `
      <div class="notification-content">
        <i class="bi ${type === "success" ? "bi-check-circle" : "bi-info-circle"}"></i>
        <span>${message}</span>
      </div>
      <button class="notification-close"><i class="bi bi-x"></i></button>
    `

    document.body.appendChild(notification)

    // Show notification with animation
    setTimeout(() => {
      notification.classList.add("show")
    }, 10)

    // Auto-hide after 3 seconds
    setTimeout(() => {
      notification.classList.remove("show")
      setTimeout(() => {
        notification.remove()
      }, 300)
    }, 3000)

    // Close button
    notification.querySelector(".notification-close").addEventListener("click", () => {
      notification.classList.remove("show")
      setTimeout(() => {
        notification.remove()
      }, 300)
    })
  }

  // Load saved layout on page load
  loadSavedLayout()
})

