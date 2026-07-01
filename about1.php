<?php include 'include/header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Page background */
    .about-bg {
        background: linear-gradient(180deg, #f8f9ff, #ffffff);
    }

    /* Section card */
    .about-section {
        padding: 45px;
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        margin-bottom: 50px;
        transition: all 0.4s ease;
        position: relative;
    }

    .about-section:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
    }

    /* Icon badge */
    .section-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin-bottom: 15px;
    }

    /* Headings */
    .about-section h4 {
        font-weight: 700;
        margin-bottom: 15px;
    }

    /* Lists */
    .about-section ul li,
    .about-section ol li {
        margin-bottom: 10px;
        font-size: 15.5px;
    }

    /* Founder */
    .founder-box {
        background: linear-gradient(135deg, #f0f4ff, #ffffff);
        border-radius: 18px;
        padding: 35px;
    }

    /* CTA */
    .cta-box {
        background: #35699d;
        color: #fff;
        padding: 60px 40px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(13, 110, 253, 0.35);
    }

    .cta-box h3 {
        font-weight: 700;
    }

    .cta-box button {
        border-radius: 50px;
        padding: 12px 35px;
        font-weight: 600;
    }

    /* Title */
    .page-title {
        font-weight: 800;
        letter-spacing: 0.5px;
    }
</style>
<!-- <h1>About Us</h1> -->
<!-- Page Title / About Banner -->
<div class="page-title about-banner d-flex align-items-center" data-aos="fade">
    <div class="container position-relative text-center">
        <h1>About Us</h1>
        <p>
            Empowering students with quality education, expert guidance,
            and career-focused learning.
        </p>
    </div>
</div>
<!-- End Page Title -->

<style>
    .about-banner {
        background: url("image.png") center center no-repeat;
        background-size: cover;
        min-height: 420px;
        position: relative;
        color: #fff;
    }

    /* Dark overlay */
    .about-banner::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }

    .about-banner .container {
        position: relative;
        z-index: 2;
    }

    .about-banner h1 {
        font-size: 48px;
        font-weight: 700;
    }

    .about-banner p {
        font-size: 18px;
        max-width: 700px;
        margin: 10px auto 0;
        color: #f1f1f1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-banner {
            min-height: 280px;
        }

        .about-banner h1 {
            font-size: 34px;
        }

        .about-banner p {
            font-size: 16px;
        }
    }

    @media (max-width: 576px) {
        .about-banner {
            min-height: 220px;
        }

        .about-banner h1 {
            font-size: 28px;
        }
    }
</style>
<div class="container mt-5 mb-5">

    <!-- <h2 class="text-center mb-5 page-title">About Higher Education Academy</h2> -->
    <!-- Founder's Note -->
    <div class="about-section founder-box" style=" text-align:justify;">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="user2.jpg" class="img-fluid rounded-circle shadow" alt="Founder">
            </div>
            <div class="col-md-8">
                <div class="section-icon"><i class="bi bi-person-circle"></i></div>
                <h4>Founder’s Note</h4>
                <p>
                    Higher Education Academy was born from a personal observation—
                    that too many students make life-shaping decisions while feeling rushed, overwhelmed, or unsure of themselves.
                </p>
                <p>
                    Over time, education consulting has become transactional. Conversations begin with institutions and end with exhaustion. I wanted to change that.
                </p>
                <p>At Higher Education Academy, we begin with the student—their story, their questions, and their vision for the future. Only when clarity emerges do we talk about options. This shift—from selling outcomes to enabling understanding—is at the heart of everything we do.</p>
                <p>I believe students deserve honesty, patience, and respect in this process. They deserve guidance that reduces anxiety, not amplifies it. And they deserve to feel confident—not just admitted—when they take their next step.</p>
                <p>Higher Education Academy exists to offer that experience.</p>
                <p class="fw-bold">— Founder, Higher Education Academy</p>
            </div>
        </div>
    </div>
    <!-- About Us -->
    <div class="about-section" style="text-align: justify;">
        <div class="section-icon"><i class="bi bi-building"></i></div>
        <h4>About Us</h4>
        <p><strong>At Higher Education Academy, we believe choosing an educational path should feel empowering—not exhausting.</strong></p>
        <p>
            Founded on the belief that every student’s journey is deeply personal, Higher Education Academy is an educational consulting firm dedicated to helping students discover their true aspirations, strengths, and long-term possibilities—before choosing an institution, course, or country.
        </p>
        <p>
            We step away from the transactional, pressure-driven model of education consulting and instead offer thoughtful, transparent guidance—where clarity comes before choice, purpose guides decisions, and every recommendation is made with integrity..
        </p>
    </div>

    <!-- Our Philosophy -->
    <div class="about-section" style="text-align: justify;">
        <div class="section-icon"><i class="bi bi-lightbulb"></i></div>
        <h4>Our Philosophy</h4>
        <p class="fst-italic fs-5">Education is not a checklist.</p>
        <p>
            Every student comes with a unique story—strengths, interests, doubts, and dreams. We invest time in understanding the individual before discussing courses, universities, or countries. Because the right choice is not the most popular one—it is the one that fits.
        </p>
    </div>

    <!-- What Sets Us Apart -->
    <div class="about-section">
        <div class="section-icon"><i class="bi bi-stars"></i></div>
        <h4>What Sets Us Apart</h4>
        <ul>
            <li><strong>Clarity over conversion</strong> — We don’t sell institutions. We guide decisions..</li>
            <li><strong>A calm, human process</strong> — Our advisory approach is structured, thoughtful, and supportive—designed to remove anxiety, not create urgency.</li>
            <li><strong>Complete transparency</strong> — Clear communication, unbiased recommendations, and no hidden costs or forced pathways.</li>
            <li><strong>Premium experience, fair pricing</strong> — High-quality guidance without inflated fees or unnecessary add-ons.</li>
            <li><strong>Long-term perspective</strong> — We focus on outcomes that matter beyond admission—satisfaction, growth, and confidence.</li>
        </ul>
    </div>

    <!-- Our Approach -->
    <div class="about-section">
        <div class="section-icon"><i class="bi bi-diagram-3"></i></div>
        <h4>Our Approach</h4>
        <p><strong>At Higher Education Academy, guidance unfolds in a deliberate and transparent journey:</strong></p>
        <ol>

            <li>Self-discovery & reflection – understanding interests, values, and aspirations</li>
            <li>Career and academic alignment – mapping intent to realistic pathways</li>
            <li>Institution & program selection – unbiased, research-driven recommendations</li>
            <li>Application & decision support – clarity at every step, no last-minute pressure</li>
        </ol>
        <p>We walk alongside students and families as trusted advisors—until clarity is achieved.</p>
    </div>

    <!-- Our Vision -->
    <div class="about-section">
        <div class="section-icon"><i class="bi bi-eye"></i></div>
        <h4>Our Vision</h4>
        <p>
            To redefine educational consulting as a space of integrity, insight, and empowerment, where students are encouraged to think independently, choose confidently, and move forward with purpose.
        </p>
    </div>



    <!-- Our Promise -->
    <div class="about-section">
        <div class="section-icon"><i class="bi bi-shield-check"></i></div>
        <h4>Our Promise</h4>
        <p class="fs-5 fw-semibold">
            We don’t measure success by admissions.
            We measure it by how confident a student feels about their decision.
        </p>
    </div>

    <!-- CTA -->
    <div class="cta-box mt-5">
        <h3>Ready to take your next step with clarity?</h3>
        <p class="mb-4">Speak with a Higher Education Academy advisor today.</p>
        <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#enquiryModal">
            Talk to an Advisor
        </button>
    </div>

</div>
</div>

<!-- Enquiry Modal (unchanged) -->
<!-- <div class="modal fade" id="enquiryModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Talk to an Advisor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" class="form-control mb-3" placeholder="Your Name" required>
                    <input type="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="text" class="form-control mb-3" placeholder="Phone" required>
                    <textarea class="form-control mb-3" placeholder="Your Message"></textarea>
                    <button class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="enquiryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content enquiry-modal">

            <!-- Header -->
            <div class="modal-header text-white" style="text-align: center !important;">
                <h5 class="modal-title" style="color:white; text-align:center !important;">
                    <i class="bi bi-chat-dots-fill me-2"></i> Talk to an Advisor
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form action="" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            placeholder="Enter your phone number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <input type="text" name="courses" class="form-control"
                            placeholder="Interested course" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="3"
                            placeholder="Write your message..."
                            style="resize:none;" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit_contact"
                            class="btn btn-gradient w-50">
                            Submit
                        </button>
                    </div>

                </form>
                <?php
                include "connection.php";

                if (isset($_POST['submit_contact'])) {

                    $name    = mysqli_real_escape_string($conn, $_POST['name']);
                    $email   = mysqli_real_escape_string($conn, $_POST['email']);
                    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
                    $courses = mysqli_real_escape_string($conn, $_POST['courses']);
                    $message = mysqli_real_escape_string($conn, $_POST['message']);

                    $sql = "INSERT INTO contact (name, email, phone, courses, message)
            VALUES ('$name', '$email', '$phone', '$courses', '$message')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Thank you! We will contact you soon.');</script>";
                    } else {
                        echo "<script>alert('Something went wrong. Please try again.');</script>";
                    }
                }
                ?>

            </div>

        </div>
    </div>
</div>
<style>
    /* Modal styling */
    .enquiry-modal {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* Header gradient */
    .enquiry-modal .modal-header {
        background: linear-gradient(135deg, #0d6efd, #123a62);
        border-bottom: none;
    }

    /* Inputs */
    .enquiry-modal .form-control {
        border-radius: 10px;
        padding: 10px 14px;
    }

    /* Gradient button */
    .btn-gradient {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 12px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-gradient:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
</style>
<?php include 'include/footer.php'; ?>