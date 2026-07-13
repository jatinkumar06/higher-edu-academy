<?php include 'include/header.php'; ?>

<!-- Custom Styles for Premium Look -->
<style>
    :root {
        --primary-color: #2c3e50;
        /* --accent-color: #3498db; */
        --card-bg: #ffffff;
        --transition-speed: 0.3s;
    }

    .cert-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cert-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    /* Card Styling */
    .cert-card {
        background: var(--card-bg);
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #f0f0f0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all var(--transition-speed) cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        position: relative;
    }

    /* Hover Animation */
    .cert-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        border-color: var(--accent-color);
    }

    .cert-thumbnail {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: #f9f9f9;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .cert-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--transition-speed);
    }

    .cert-card:hover .cert-thumbnail img {
        transform: scale(1.05);
    }

    /* Badge/Icon Overlay */
    .cert-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.9);
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: bold;
        color: var(--primary-color);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .cert-info {
        padding: 20px;
    }

    .cert-info h3 {
        margin: 0 0 10px 0;
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .cert-info p {
        margin: 0;
        font-size: 0.9rem;
        color: #7f8c8d;
    }

    /* Modal Styling */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(5px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        padding: 20px;
    }

    .modal-content {
        position: relative;
        width: 90%;
        max-width: 1000px;
        height: 85vh;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        animation: modalFadeIn 0.4s ease;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .close-modal {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
        z-index: 1001;
    }

    .modal-body-content {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-body-content img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .modal-body-content iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<div class="cert-container">
    <h2 style="text-align:center; margin-bottom: 40px; color: #2c3e50;">My Professional Certifications</h2>

    <div class="cert-grid">
        <!-- Card 1: Image Certificate -->
        <div class="cert-card" data-type="image" data-src="assets/certs/udyam.jpeg">
            <div class="cert-thumbnail">
                <div class="cert-badge">Certificate</div>
                <img src="assets/certs/udyam.jpeg" alt="UDYAM Certificate">
            </div>
            <div class="cert-info">
                <h3>UDYAM Registration Certificate</h3>
                <p>Issued by UDYAM</p>
            </div>
        </div>

        <div class="cert-card" data-type="image" data-src="assets/certs/ugc.jpeg">
            <div class="cert-thumbnail">
                <div class="cert-badge">Certificate</div>
                <img src="assets/certs/ugc.jpeg" alt="UGC Certificate">
            </div>
            <div class="cert-info">
                <h3>UGC Copy</h3>
                <p>Issued by RAYALASEEMA UNIVERSITY</p>
            </div>
        </div>

        <!-- Card 2: PDF Certificate -->
        <div class="cert-card" data-type="pdf" data-src="assets/certs/Equivalent-notice.pdf">
            <div class="cert-thumbnail">
                <div class="cert-badge">PDF</div>
                <img src="assets/certs/image.png" alt="Equivalency Certificate">
            </div>
            <div class="cert-info">
                <h3>Equivalency Certificate</h3>
                <p>Issued by Utkal University</p>
            </div>
        </div>

        <div class="cert-card" data-type="pdf" data-src="assets/certs/UGCmats.pdf">
            <div class="cert-thumbnail">
                <div class="cert-badge">PDF</div>
                <img src="assets/certs/image.png" alt="Equivalency Certificate">
            </div>
            <div class="cert-info">
                <h3>Ugc copy Mats university Certificate</h3>
                <p>Issued by Mats university</p>
            </div>
        </div>

        <!-- Add more cards as needed -->
    </div>
</div>

<!-- Modal Structure -->
<div id="certModal" class="modal-overlay">
    <span class="close-modal">&times;</span>
    <div class="modal-content">
        <div id="modalBody" class="modal-body-content">
            <!-- Content will be injected here via JS -->
        </div>
    </div>
</div>

<script>
    const cards = document.querySelectorAll('.cert-card');
    const modal = document.getElementById('certModal');
    const modalBody = document.getElementById('modalBody');
    const closeBtn = document.querySelector('.close-modal');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            const type = card.getAttribute('data-type');
            const src = card.getAttribute('data-src');

            modalBody.innerHTML = ''; // Clear previous content

            if (type === 'image') {
                const img = document.createElement('img');
                img.src = src;
                modalBody.appendChild(img);
            } else if (type === 'pdf') {
                const iframe = document.createElement('iframe');
                iframe.src = src + "#toolbar=0"; // Hide PDF toolbar for cleaner look
                modalBody.appendChild(iframe);
            }

            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
    });

    // Close Modal Logic
    const closeModal = () => {
        modal.style.display = 'none';
        modalBody.innerHTML = '';
        document.body.style.overflow = 'auto';
    };

    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
</script>

<?php include 'include/footer.php'; ?>