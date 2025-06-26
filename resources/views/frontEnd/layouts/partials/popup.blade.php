<!-- Global Popup Modal -->
<div class="modal fade" id="globalPopupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="globalPopupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
        <div class="modal-content" style="background: #fff; border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header border-0" style="padding: 1rem 1rem 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 pb-4" style="padding-top: 0;">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Dilmog Logo" class="mb-4" style="max-height: 60px; max-width: 200px; height: auto;">
                <h3 class="mb-3" style="color: #111; font-size: 24px; font-weight: 600;" id="popupTitle">Welcome to Dilmog Logistics</h3>
                <p class="mb-4" style="color: #666; font-size: 16px; line-height: 1.5;" id="popupMessage">Your trusted partner in logistics and delivery services.</p>
                <div class="d-grid gap-2" id="popupButtons">
                    <!-- Buttons will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Popup Modal Styles */
#globalPopupModal .modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

#globalPopupModal .modal-header {
    padding: 1rem 1rem 0;
}

#globalPopupModal .modal-body {
    padding-top: 0;
}

#globalPopupModal .modal-body img {
    max-width: 200px;
    height: auto;
}

#globalPopupModal .btn-primary {
    background-color: #0151ab;
    border-color: #0151ab;
}

#globalPopupModal .btn-primary:hover {
    background-color: #0151ab;
    border-color: #0151ab;
}

#globalPopupModal .btn-outline-primary {
    color: #0151ab;
    border-color: #0151ab;
}

#globalPopupModal .btn-outline-primary:hover {
    background-color: #0151ab;
    border-color: #0151ab;
}

@media (max-width: 576px) {
    #globalPopupModal .modal-dialog {
        margin: 1rem;
    }
    
    #globalPopupModal .modal-body {
        padding: 1rem;
    }
    
    #globalPopupModal .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 1rem;
    }
    
    #globalPopupModal .modal-body h3 {
        font-size: 20px;
    }
    
    #globalPopupModal .modal-body p {
        font-size: 14px;
    }
}
</style>

<script>
// Function to show popup with custom content
function showGlobalPopup(options = {}) {
    const modalElement = document.getElementById('globalPopupModal');
    let modal = bootstrap.Modal.getInstance(modalElement);
    if (!modal) {
        modal = new bootstrap.Modal(modalElement);
    }

    // Set default options
    const defaultOptions = {
        title: 'Welcome to Dilmog Logistics',
        message: 'Your trusted partner in logistics and delivery services.',
        buttons: [],
        showCloseButton: true,
        onClose: null
    };
    
    // Merge default options with provided options
    const settings = { ...defaultOptions, ...options };
    
    // Update modal content
    document.getElementById('popupTitle').textContent = settings.title;
    document.getElementById('popupMessage').textContent = settings.message;
    
    // Clear and add buttons
    const buttonsContainer = document.getElementById('popupButtons');
    buttonsContainer.innerHTML = '';
    
    settings.buttons.forEach(button => {
        const btn = document.createElement('button');
        btn.className = `btn ${button.class || 'btn-primary'} btn-lg`;
        btn.textContent = button.text;
        if (button.onClick) {
            btn.onclick = button.onClick;
        }
        if (button.href) {
            const link = document.createElement('a');
            link.href = button.href;
            link.className = btn.className;
            link.textContent = button.text;
            buttonsContainer.appendChild(link);
        } else {
            buttonsContainer.appendChild(btn);
        }
    });
    
    // Handle close button
    const closeButton = document.querySelector('#globalPopupModal .btn-close');
    if (settings.showCloseButton) {
        closeButton.style.display = 'block';
    } else {
        closeButton.style.display = 'none';
    }

    // Clean up after modal is hidden
    modalElement.addEventListener('hidden.bs.modal', function () {
        // Remove all lingering backdrops
        document.querySelectorAll('.modal-backdrop').forEach(el => el.parentNode && el.parentNode.removeChild(el));
        // Remove modal-open class and all inline styles from body
        document.body.classList.remove('modal-open');
        document.body.removeAttribute('style');
        if (settings.onClose) settings.onClose();
    }, { once: true });

    // Show the modal
    modal.show();
}

// Example usage:
/*
showGlobalPopup({
    title: 'Custom Title',
    message: 'Custom message here',
    buttons: [
        {
            text: 'Register as Merchant',
            class: 'btn-primary',
            href: '/merchant/register'
        },
        {
            text: 'Become a Delivery Partner',
            class: 'btn-outline-primary',
            href: '/deliveryman/register'
        }
    ],
    showCloseButton: true,
    onClose: () => {
        console.log('Popup closed');
    }
});
*/
</script> 