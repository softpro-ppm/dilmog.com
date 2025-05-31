<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Topbar Start -->
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <div class="border-end border-primary pe-3">
                        <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                    </div>
                    <div class="ps-3">
                        <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>example@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end">
                    <div class="d-flex border-end border-primary pe-3">
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="dropdown ms-3">
                        <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> English</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item">English</a>
                            <a href="#" class="dropdown-item">Bangla</a>
                            <a href="#" class="dropdown-item">French</a>
                            <a href="#" class="dropdown-item">Spanish</a>
                            <a href="#" class="dropdown-item">Arabic</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Updated Navbar Section -->
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="/" class="navbar-brand p-0">
                <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> LifeSure</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <!-- <a href="/" class="nav-item nav-link active">Home</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Services</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="/services/domestic" class="dropdown-item">Domestic Delivery</a>
                            <a href="/services/ecommerce" class="dropdown-item">E-commerce Delivery</a>
                            <a href="/services/corporate" class="dropdown-item">Corporate & SME Delivery</a>
                            <a href="/services/air-parcel" class="dropdown-item">Air Parcel</a>
                            <a href="/services/pick-drop" class="dropdown-item">Parcel Pick  Drop Service</a>
                        </div>
                    </div>
                    <a href="/tracking" class="nav-item nav-link">Tracking</a>
                    <a href="/offices" class="nav-item nav-link">Our Offices</a>
                    <a href="/blog" class="nav-item nav-link">Blog</a>
                    <a href="/shipping-plans" class="nav-item nav-link">Shipping Plans</a>
                    <div class="nav-btn px-3 d-flex align-items-center gap-2">
                        <a href="/merchant/register" class="btn rounded-pill py-2 px-4 me-2 d-flex align-items-center registration-btn fw-bold" style="font-weight:700; color:#015FC9; border:1.5px solid #015FC9; background:transparent;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="margin-right:8px;"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M3 8h18" stroke="currentColor" stroke-width="2"/><path d="M7 12h5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            Registration
                        </a>
                        <a href="/merchant/login" class="btn btn-primary rounded-pill py-2 px-4 me-2 d-flex align-items-center fw-bold" style="font-weight:700;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2" style="margin-right:8px;"><circle cx="12" cy="8" r="4" stroke="#fff" stroke-width="2" fill="none"/><path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="#fff" stroke-width="2" fill="none"/></svg>
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Add Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">Enter your search query</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Added a script to ensure the correct tab is active on page load -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.mobile-tab button');
        const activeTab = localStorage.getItem('activeTab') || 'Track Order';

        tabs.forEach(tab => {
            if (tab.textContent.trim() === activeTab) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }

            tab.addEventListener('click', function () {
                localStorage.setItem('activeTab', this.textContent.trim());
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
