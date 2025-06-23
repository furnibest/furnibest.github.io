@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Contact Us</h1>
            <p class="lead">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone">
                </div>
                
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <select class="form-select" id="subject" required>
                        <option value="">Select a subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="support">Product Support</option>
                        <option value="sales">Sales</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Our Location</h5>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> Jl Mantingan Bugel RT18 RW 06<br>
                        Mantingan. Tahunan Jepara<br>
                        Indonesia
                    </p>
                    
                    <h5 class="card-title mt-4">Contact Information</h5>
                    <p class="card-text">
                        <i class="fas fa-phone"></i> +6282128139206<br>
                        <i class="fas fa-envelope"></i> cacamfurniture@gmail.com
                    </p>
                    
                    <h5 class="card-title mt-4">Business Hours</h5>
                    <p class="card-text">
                        Monday - Friday: 9:00 AM - 6:00 PM<br>
                        Saturday: 10:00 AM - 4:00 PM<br>
                        Sunday: Closed
                    </p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="btn btn-outline-primary me-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.facebook.com/share/1YbT4R4tLD/?mibextid=wwXIfr" class="btn btn-outline-info me-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger me-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add form submission logic here
    alert('Thank you for your message. We will get back to you soon!');
    this.reset();
});
</script>
@endsection 