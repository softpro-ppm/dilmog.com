<!-- Global Popup B Modal -->
<div class="modal" id="globalPopupBModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="globalPopupBModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 750px;">
        <div class="modal-content" style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header border-0" style="padding: 1rem 1rem 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 pb-4" style="padding-top: 0;">
                <h3 class="mb-3" style="color: #111; font-size: 24px; font-weight: bold;" id="popupBTitle">Global Popup B</h3>
                <p class="mb-4" style="color: #666; font-size: 16px; line-height: 1.5;" id="popupBMessage">This is a global popup available on all pages.</p>
                <div class="d-grid gap-2" id="popupBButtons">
                    <!-- Buttons will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
#globalPopupBModal .modal-dialog {
    max-width: 750px;
    width: 100%;
    margin: 2rem auto;
}
#globalPopupBModal .modal-content {
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 0;
    padding: 0;
}
#globalPopupBModal .modal-header {
    border: none;
    padding: 1rem 1rem 0.5rem 1rem;
}
#globalPopupBModal .modal-body {
    padding: 2rem 2.5rem 2rem 2.5rem;
    text-align: left;
}
#globalPopupBModal .modal-body h3 {
    color: #222;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: left;
    line-height: 1.2;
    border-bottom: 1px solid #ccc !important; /* Updated border color */
    padding-bottom: 0.5rem;
    margin-top: 1rem; /* Added margin-top to lower the header line */
}
#globalPopupBModal .modal-body p {
    color: #222;
    font-size: 1.05rem;
    line-height: 1.7;
    margin-bottom: 0;
    text-align: left;
}
#popupBButtons { /* New style for button container */
    display: flex;
    /* justify-content: flex-end; */
    padding-top: 1rem; /* Add some padding above the button */
    border-top: 1px solid #ccc; /* Add a border on top */
    margin-top: 1.5rem; /* Add some margin above the border */
}
@media (max-width: 600px) {
    #popupBButtons {
        display: block !important; /* Ensure full width for button container on mobile */
    }
    #globalPopupBModal .modal-body h3 {
        font-size: 1.1rem;
    }
    #globalPopupBModal .modal-body p {
        font-size: 0.95rem;
    }
}
#globalPopupBModal .btn-danger {
    background: #007bff; /* Changed to a blue theme color */
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    padding: 0.5rem 2.5rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    outline: none !important; /* Remove outline on focus */
    box-shadow: none !important; /* Remove box-shadow on focus */
}
#globalPopupBModal .btn-danger:hover {
    background: #0056b3; /* Darker shade for hover */
    border-color: transparent !important; /* Remove border on hover */
}
#globalPopupBModal .btn-danger:focus {
    border-color: transparent !important; /* Remove border on focus */
    outline: none !important; /* Ensure no outline on focus */
    box-shadow: none !important; /* Ensure no box-shadow on focus */
}
#globalPopupBModal .btn-close {
    position: absolute;
    right: 1.25rem;
    top: 1.25rem;
    z-index: 10;
}
#globalPopupBModal .modal-body img {
    max-width: 200px;
    height: auto;
}
@media (max-width: 600px) {
    #globalPopupBModal .modal-dialog {
        max-width: 100vw;
        width: 100vw;
        margin: 1rem 0 1rem 0;
    }
    #globalPopupBModal .modal-content {
        border-radius: 0;
    }
    #globalPopupBModal .modal-body {
        padding: 1rem 0.5rem 1.5rem 0.5rem;
    }
    #globalPopupBModal .modal-body h3 {
        font-size: 1.2rem;
    }
    #globalPopupBModal .modal-body p {
        font-size: 0.98rem;
    }
    #globalPopupBModal .btn-danger {
        width: 100%;
    }
}
</style>
<script>
window.hasShownGlobalPopupB = window.hasShownGlobalPopupB || false;
document.addEventListener('DOMContentLoaded', function() {
    let currentPath = window.location.pathname;
    // Normalize currentPath: remove trailing slash (if not root) and convert to lowercase
    if (currentPath !== '/' && currentPath.endsWith('/')) {
        currentPath = currentPath.slice(0, -1);
    }
    currentPath = currentPath.toLowerCase();

    // Normalize allowedPaths to lowercase for consistent comparison
    const allowedPaths = ['/'].map(p => { // Only show on homepage
        let normalizedP = p.toLowerCase();
        if (normalizedP !== '/' && normalizedP.endsWith('/')) {
            normalizedP = normalizedP.slice(0, -1);
        }
        return normalizedP;
    });

    if (!window.hasShownGlobalPopupB && allowedPaths.includes(currentPath)) {
        fetch('/notices/active')
            .then(response => response.json())
            .then(function(notice) {
                if (notice && notice.title && notice.description) {
                    showGlobalPopupB({
                        title: notice.title,
                        message: notice.description,
                        buttons: [
                            {
                                text: 'Close',
                                class: 'btn btn-danger',
                                onClick: function() {
                                    bootstrap.Modal.getInstance(document.getElementById('globalPopupBModal')).hide();
                                }
                            }
                        ]
                    });
                }
            });
        window.hasShownGlobalPopupB = true;
    }
});

function showGlobalPopupB(options = {}) {
    const modalElement = document.getElementById('globalPopupBModal');
    let modal = bootstrap.Modal.getInstance(modalElement);
    if (!modal) {
        modal = new bootstrap.Modal(modalElement);
    }
    const defaultOptions = {
        title: 'Global Popup B',
        message: 'This is a global popup available on all pages.',
        buttons: [],
        showCloseButton: true,
        onClose: null
    };
    const settings = { ...defaultOptions, ...options };
    document.getElementById('popupBTitle').textContent = settings.title;
    document.getElementById('popupBMessage').innerHTML = settings.message;
    const buttonsContainer = document.getElementById('popupBButtons');
    buttonsContainer.innerHTML = '';
    settings.buttons.forEach(button => {
        const btn = document.createElement('button');
        btn.className = `btn ${button.class || 'btn-primary'} btn-lg`;
        btn.textContent = button.text;
        if (button.onClick) btn.onclick = button.onClick;
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
    const closeButton = document.querySelector('#globalPopupBModal .btn-close');
    closeButton.style.display = settings.showCloseButton ? 'block' : 'none';
    modalElement.addEventListener('hidden.bs.modal', function () {
        document.querySelectorAll('.modal-backdrop').forEach(el => el.parentNode && el.parentNode.removeChild(el));
        document.body.classList.remove('modal-open');
        document.body.removeAttribute('style');
        if (settings.onClose) settings.onClose();
    }, { once: true });
    modal.show();

    // Close modal on outside click
    modalElement.addEventListener('click', function(event) {
        if (event.target === modalElement) { // Check if the click is on the backdrop
            modal.hide();
        }
    });
}
</script>