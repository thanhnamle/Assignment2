<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Jobs Landing: Find your dream job today. Explore diverse job opportunities and kickstart your career.">
  <meta name="keywords" content="jobs, career, apply, dream job, software engineer, marketing, design">
  <meta name="author" content="Trương Việt Hưng - 104775470">

  <title>Jobs Landing - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
</head>
<body class="home-body">
  <!-- Header section -->
        <?php 
          include 'include\header.inc'; 
        ?>

  <main class="home-main">
    <section class="hero">
      <div class="container">
        <div class="hero-img">
          <img src="styles/images/carousel-1.jpg" alt="hero-background" >
        </div>
        <div class="hero-content">
          <h1>Find Your Dream Job</h1>
          <p>Explore our diverse job listings and start your next career journey.</p>
          <a href="#featured-jobs" class="hero-btn">Explore Now</a>
        </div>
      </div>
    </section>

    <section id="featured-jobs" class="featured-jobs">
      <div class="container">
        <h2>Featured Jobs</h2>
        <div class="job-cards">
          <div class="job-card">
            <div class="job-card-image"><img src="styles/images/front-end.png" alt="front-end"></div>
            <div class="job-card-content">
              <h3>Front-end Developer</h3>
              <p>👨‍🎨 Front-End Developer: "Bringing designs to life with seamless, interactive experiences." </p>
              <div class="apply-button">
                <a href="jobs.php">Apply</a>
              </div>
            </div>
          </div>
          <div class="job-card">
            <div class="job-card-image"><img src="styles/images/back_end_developer.png" alt="back_end_developer"></div>
            <div class="job-card-content">
              <h3>Back-end Developer</h3>
              <p>👨‍💻 Back-End Developer: "Powering the web with robust, scalable, and secure systems." </p>
              <div class="apply-button">
                <a href="jobs.php">Apply</a>
              </div>
            </div>
          </div>
          <div class="job-card">
            <div class="job-card-image"><img src="styles/images/data-engineer3.jpg" alt="data-engineer"></div>
            <div class="job-card-content">
              <h3>Data Engineer</h3>
              <p>📊 Data Engineer: "Transforming raw data into actionable insights with precision." </p>
              <div class="apply-button">
                <a href="jobs.php">Apply</a>
              </div>
            </div>
          </div>
          <div class="job-card">
            <div class="job-card-image"><img src="styles/images/quality_control.webp" alt="quality_control"></div>
            <div class="job-card-content">
              <h3>Quality Control Engineer</h3>
              <p>🔍 Quality Control Engineer: "Ensuring flawless performance through meticulous testing." </p>
              <div class="apply-button">
                <a href="jobs.php">Apply</a>
              </div>
            </div>
          </div>
          <div class="job-card">
            <div class="job-card-image"><img src="styles/images/automation_engineer.jpg" alt="automation_engineer"></div>
            <div class="job-card-content">
              <h3>Automation Engineer</h3>
              <p>🤖 Automation Engineer: "Optimizing workflows by turning manual tasks into automation." </p>
              <div class="apply-button">
                <a href="jobs.php">Apply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <div class="about-us">
      <h2>About Us</h2>
      <div class="container-about-us">
        <div class="text-content">
            <h3>Enterprise Suite</h3>
            <h1>This is how <br> <span>good companies</span> <br> find good company.</h1>
            <p>JobsLanding - Access Top Talent and Full Suite of Hybrid Workforce Management Tools. This is how innovation works now.</p>
            <ul class="about-us-list">
              <li>✔ Access expert talent to fill your skill gaps</li>
              <li>✔ Control your workflow: hire, classify and pay your talent</li>
              <li>✔ Partner with Upwork for end-to-end support</li>
            </ul>
            <button class="about-us-button">Learn more</button>
        </div>
        <div class="image-content">
          <img src="styles/images/about-8.jpg" alt="Enterprise_Suite_Image">
        </div>
      </div>
  
      <br>
  
      <div class="container-about-us-2">
        <div class="image-content-2">
          <img src="styles/images/about-9.jpeg" alt="Find_suitable_job_Image">
        </div>
        <div class="text-content-2">
            <h3>Find suitable job</h3>
            <p>Meet clients you’re excited to work with and take your career or business to new heights.</p>
            <ul class="about-us-list-2">
              <li>✔ Find opportunities for every stage of your freelance career</li>
              <li>✔ Control when, where, and how you work</li>
              <li>✔ Explore different ways to earn</li>
            </ul>
            <a href="jobs.php" class="about-us-button-2">Find opportunities</a>
        </div>
      </div>
    </div>
    
  
  
  
    <!--Testimonial Start-->
    <div class="container">
      <h2 class="section-title">Our Clients Say!!!</h2>
      
      <div class="timeline-container">
          <div class="timeline">
              <!-- Repeat comments -->
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>John Doe</h3>
                          <span>2 hours ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      This platform exceeded my expectations! The user interface is intuitive and the features are exactly what I needed for my job search.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Sarah Williams</h3>
                          <span>5 hours ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      I found my dream job through this platform. The job matching algorithm is incredibly accurate!
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Mike Johnson</h3>
                          <span>1 day ago</span>
                      </div>
                      <div class="rating">★★★★☆</div>
                  </div>
                  <p class="comment-text">
                      Great platform for job seekers. The variety of opportunities available is impressive.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Emily Chen</h3>
                          <span>2 days ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      The resume builder tool is fantastic! It helped me create a professional-looking resume in minutes.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>David Brown</h3>
                          <span>3 days ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      Excellent platform! The job alerts feature keeps me updated with relevant opportunities.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Lisa Anderson</h3>
                          <span>4 days ago</span>
                      </div>
                      <div class="rating">★★★★☆</div>
                  </div>
                  <p class="comment-text">
                      Very user-friendly interface. The application tracking system is particularly helpful.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Tom Wilson</h3>
                          <span>5 days ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      The career resources section is invaluable. Found great tips for interviews!
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Anna Martinez</h3>
                          <span>1 week ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      Successfully changed my career path thanks to this platform. The career counseling service is top-notch!
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Robert Taylor</h3>
                          <span>1 week ago</span>
                      </div>
                      <div class="rating">★★★★☆</div>
                  </div>
                  <p class="comment-text">
                      Great community of professionals. The networking features are well implemented.
                  </p>
              </div>
  
              <div class="timeline-comment">
                  <div class="comment-header">
                      <div class="user-info">
                          <h3>Karen White</h3>
                          <span>2 weeks ago</span>
                      </div>
                      <div class="rating">★★★★★</div>
                  </div>
                  <p class="comment-text">
                      The salary insights feature helped me negotiate better compensation. Highly recommend!
                  </p>
              </div>
          </div>
      </div>
    </div>
  </main>

  <!-- Footer section -->
      <?php 
        include 'include\footer.inc'; 
      ?>
</body>
</html>