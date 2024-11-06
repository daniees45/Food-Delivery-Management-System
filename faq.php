<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ and Help Center</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        
        main { padding: 2rem; }
        h1 { color: #333; }
        .search-bar{
            margin-top: 15px;
        }
        .search-bar input { width: 100%; padding: 0.5rem; font-size: 1rem; margin-bottom: 1rem; }
        
        /* FAQ categories styling */
        .faq-categories { display: flex; flex-wrap: wrap; gap: 1rem; }
        .category { padding: 1rem; background: #f1f1f1; border-radius: 5px; cursor: pointer; width: 200px; text-align: center; }
        .category:hover { background: #ddd; }
        
        /* FAQ section styling */
        .faq-item { margin-top: 1rem; }
        .faq-question { cursor: pointer; padding: 0.5rem; background: #007BFF; color: #fff; border-radius: 5px; }
        .faq-answer { display: none; padding: 0.5rem; background: #f9f9f9; margin-top: 0.5rem; border-radius: 5px; }
    </style>
</head>
<body>

<header>
    <div class="homepage">
        <div>
            
            <div class="header-content">
                    <a href="" class="headerlink"><p>PAJ</p></a>
            </div>
            <div class="header2">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="resgistration.php">Register</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        
                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<main>

    <!-- Search Bar -->
    <section class="search-bar">
        <input type="text" placeholder="Search FAQs..." />
    </section>

    <!-- FAQ Categories -->
    <section class="faq-categories">
        <div class="category">Delivery</div>
        <div class="category">Payments</div>
        <div class="category">Account Management</div>
        <div class="category">Returns & Refunds</div>
        <!-- Add more categories as needed -->
    </section>

    <!-- FAQ Expandable Sections -->
    <section class="faq-section">
        <div class="faq-item">
            <div class="faq-question">What is the delivery time?</div>
            <div class="faq-answer">Delivery typically takes 3-5 business days.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How can I change my payment method?</div>
            <div class="faq-answer">Go to your account settings and select "Payment Options" to change your payment method.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How do I reset my password?</div>
            <div class="faq-answer">Click on "Forgot Password" on the login page and follow the instructions.</div>
        </div>
        <!-- Add more FAQs as needed -->
    </section>
</main>
<div id="page-footer">
    <footer class="foot1">
     <div class="foot1-div">
        <nav class="foot1-nav">
            <div class="foot1-div1">
                <div class="foot1-div2">
                    <div class="foot1-div3">
                        <h3 class="foot1-h3">Discover PAJ</h3>
                        <ul class="foot1-ul">
                            <li><p><a href="http://">Delivery</a></p></li>
                            <li><p><a href="http://">About</a></p></li>
                            <li><p><a href="policy.html">Policy</a></p></li>
                        </ul>
                    </div>
                </div>
                
                    <nav class="foot1-nav">
                        
                            <div class="foot1-div2">
                                <div class="foot1-div3">
                                    <h3 class="foot1-h3">Legal</h3>
                                    <ul class="foot1-ul">
                                        <li><p><a href="http://">Terms and Conditions</a></p></li>
                                        <li><p><a href="policy.html">Privacy</a></p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        
                    </nav>
                    <nav class="foot1-nav">
                        
                        <div class="foot1-div2">
                            <div class="foot1-div3">
                                <h3 class="foot1-h3">Legal</h3>
                                <ul class="foot1-ul">
                                    <li><p><a href="">Terms and Conditions</a></p></li>
                                    <li><p><a href="policy.html">Privacy</a></p></li>
                                   
                                </ul>
                            </div>
                        </div>
                    
                </nav>
                <nav class="foot1-nav">
                        
                    <div class="foot1-div2">
                        <div class="foot1-div3">
                            <h3 class="foot1-h3">Help</h3>
                            <ul class="foot1-ul">
                                <li><p><a href="contact.html">Contact</a></p></li>
                                <li><p><a href="faq.html">FAQs</a></p></li>
                               
                            </ul>
                        </div>
                    </div>
                
            </nav>
                 </div> 
           
        </nav>
        
     </div> 
     
        
     <p>&copy; 2024 PAJ Delivery Service</p>
    </footer>
   
   </div>
<script>
    // JavaScript for FAQ toggle
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

</body>
</html>