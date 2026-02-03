<footer class="footer">
  <div class="footer-container">
    
    <div class="footer-col">
      <h4>Social</h4>
      <ul>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">X (Twitter)</a></li>
        
        <li><a href="{{ route('contacto') }}">Get in Touch</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Explore Features</h4>
      <ul>
        <li><a href="#">Our Process</a></li>
        <li><a href="#">Projects</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Our Story</h4>
      <ul>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Fire Rebuild</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>FAQ</h4>
      <ul>
        <li><a href="#">Institutional</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
  </div>

  <div class="newsletter">
    <span>Newsletter</span>
    
    <form action="" method="POST">
      @csrf <input type="email" name="email" placeholder="Enter your email address" required />
      <button type="submit">Subscribe</button>
    </form>
  </div>

  <div class="footer-bottom">
    <div class="logo">
      <span>Modulia</span>
    </div>

    <p>© 2026 All rights reserved.</p>
    <p>CSLB Contractor License<br />B Class - 1039029</p>
    <p>Designed and manufactured in<br />Valencia, Spain.</p>
  </div>
</footer>