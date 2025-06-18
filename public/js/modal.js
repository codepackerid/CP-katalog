/**
 * Modal Interaction Handler
 * 
 * Handles all modal-related interactions with improved accessibility,
 * animations, and user experience.
 */
document.addEventListener("DOMContentLoaded", function() {
    // Store active modal for tracking
    let activeModal = null;
    
    // Cache commonly used selectors
    const body = document.body;
    
    // Initialize all modals
    initModals();

    function initModals() {
        // Get all modal triggers
        const modalTriggers = document.querySelectorAll("[data-modal-trigger]");
        const modalCloseButtons = document.querySelectorAll("[data-modal-close]");
        
        // Add event listeners to all modal triggers
        modalTriggers.forEach(trigger => {
            const modalId = trigger.getAttribute("data-modal-trigger");
            const modal = document.getElementById(modalId);
            
            if (modal) {
                trigger.addEventListener("click", (e) => {
                    e.preventDefault();
                    openModal(modal);
                });
            }
        });
        
        // Add event listeners to all close buttons
        modalCloseButtons.forEach(button => {
            const modalId = button.getAttribute("data-modal-close");
            const modal = document.getElementById(modalId);
            
            if (modal) {
                button.addEventListener("click", (e) => {
                    e.preventDefault();
                    closeModal(modal);
                });
            }
        });

        // Handle click on modal backdrop
        document.querySelectorAll(".modal").forEach(modal => {
            modal.addEventListener("click", (e) => {
                if (e.target === modal || e.target.classList.contains("modal-backdrop")) {
                    closeModal(modal);
                }
            });
            
            // Setup keyboard event listeners for each modal
            modal.addEventListener("keydown", handleModalKeydown);
        });
    }

    /**
     * Open a modal with a smooth animation
     */
    function openModal(modal) {
        if (!modal) return;
        
        // Close any active modal first
        if (activeModal) {
            closeModal(activeModal);
        }
        
        // Update active modal reference
        activeModal = modal;
        
        // Add animation class
        const modalContent = modal.querySelector(".modal-backdrop + div");
        if (modalContent) {
            modalContent.classList.add("animate-modal");
        }
        
        // Show modal
        modal.classList.remove("hidden");
        
        // Prevent body scrolling
        body.classList.add("overflow-hidden");
        
        // Set focus to first focusable element
        const focusableElements = getFocusableElements(modal);
        if (focusableElements.length > 0) {
            setTimeout(() => {
                focusableElements[0].focus();
            }, 100);
        }
        
        // Trigger custom event
        modal.dispatchEvent(new CustomEvent("modal:opened"));
    }

    /**
     * Close a modal with a smooth animation
     */
    function closeModal(modal) {
        if (!modal) return;
        
        // Add closing animation
        const modalContent = modal.querySelector(".modal-backdrop + div");
        if (modalContent) {
            modalContent.classList.add("animate-modal-out");
            
            // Wait for animation to complete
            setTimeout(() => {
                modal.classList.add("hidden");
                modalContent.classList.remove("animate-modal-out");
                
                // Reset active modal if this was the active one
                if (activeModal === modal) {
                    activeModal = null;
                }
                
                // Allow body scrolling if no modals are open
                if (!activeModal) {
                    body.classList.remove("overflow-hidden");
                }
                
                // Trigger custom event
                modal.dispatchEvent(new CustomEvent("modal:closed"));
            }, 300);
        } else {
            // No animation, just hide
            modal.classList.add("hidden");
            
            // Reset active modal if this was the active one
            if (activeModal === modal) {
                activeModal = null;
            }
            
            // Allow body scrolling if no modals are open
            if (!activeModal) {
                body.classList.remove("overflow-hidden");
            }
            
            // Trigger custom event
            modal.dispatchEvent(new CustomEvent("modal:closed"));
        }
    }

    /**
     * Handle keyboard events for modals
     */
    function handleModalKeydown(e) {
        const modal = e.currentTarget;
        
        // Close on Escape key
        if (e.key === "Escape") {
            closeModal(modal);
            return;
        }
        
        // Handle tab key for focus trapping
        if (e.key === "Tab") {
            trapFocus(e, modal);
        }
    }

    /**
     * Trap focus within the modal
     */
    function trapFocus(e, modal) {
        const focusableElements = getFocusableElements(modal);
        
        if (focusableElements.length === 0) return;
        
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        // If shift+tab on first element, move to last element
        if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
        } 
        // If tab on last element, move to first element
        else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
        }
    }

    /**
     * Get all focusable elements within a container
     */
    function getFocusableElements(container) {
        return Array.from(
            container.querySelectorAll(
                "button, [href], input, select, textarea, [tabindex]:not([tabindex='-1'])"
            )
        ).filter(el => !el.hasAttribute("disabled") && el.offsetParent !== null);
    }

    // Expose modal API to global scope
    window.ModalManager = {
        open: function(modalId) {
            const modal = document.getElementById(modalId);
            openModal(modal);
        },
        close: function(modalId) {
            const modal = document.getElementById(modalId);
            closeModal(modal);
        },
        closeAll: function() {
            document.querySelectorAll(".modal:not(.hidden)").forEach(modal => {
                closeModal(modal);
            });
        }
    };
});

// Add closing animation style
document.head.insertAdjacentHTML("beforeend", `
<style>
    .animate-modal-out {
        animation: modalFadeOut 0.3s ease-out forwards !important;
    }
    
    @keyframes modalFadeOut {
        from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        to {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
    }
</style>
`);
