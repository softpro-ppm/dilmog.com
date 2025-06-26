<!-- Payment Poster Modal -->
<div class="modal fade" id="PaymentPosterModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-top: 100px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <a href="" id="PosterImageA" download>
                    <img id="PosterImage" src="" alt="" style="max-width: 100%; height: auto;">
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Payment Poster Modal Handler
document.addEventListener('DOMContentLoaded', function() {
    // Event listener for BankPosterBTN click
    document.body.addEventListener('click', function(e) {
        if (e.target.classList.contains('BankPosterBTN')) {
            e.preventDefault();
            
            // Get the poster image path from data attribute
            const posterPath = e.target.dataset.poster;
            
            if (posterPath) {
                // Set the href and src attributes for the anchor and image
                document.getElementById('PosterImageA').href = posterPath;
                document.getElementById('PosterImage').src = posterPath;
                
                // Show the Bootstrap modal
                const modal = new bootstrap.Modal(document.getElementById('PaymentPosterModal'));
                modal.show();
            } else {
                alert('No poster available');
            }
        }
    });
});
</script> 