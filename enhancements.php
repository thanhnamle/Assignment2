<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lê Thành Nam - 104999380, Trương Việt Hưng - 104775470">
    <title>Enhancements</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="enhancements-body">
    <!-- Header section -->
    <?php 
        include 'include\header.inc'; 
    ?>

    <!-- Enhancements section -->
    <header class="enhancements-header">
        <h1>List of Additional Enhancements</h1>
    </header>
    <main class="enhancements-main">
        <div class="scroll-list_wrp">
            <section class="enhancements-section">
                <h2>Enhancement 1: Fade-in Effect on Scroll</h2>
                <p>We have added a fade-in effect to elements on the <a href="about.html">about.html</a> page to create a smooth scrolling experience.</p>
            </section>
    
            <section class="enhancements-section">
                <h2>Enhancement 2: CSS pseudo-element </h2>
                <p>The ::before pseudo-element in .hero-btn of <a href="index.html">index.html</a> creates a dynamic background effect that enhances interactivity. When hovered, it smoothly expands, giving the button a modern and engaging visual transition.</p>
            </section>
    
            <section class="enhancements-section">
                <h2>Enhancement 3: Responsive of Header and Footer </h2>
                <p> On the <a href="home.html">home.html <br></a>
                    When the screen width drops below 865px, the traditional navigation bar is replaced with a hamburger menu, optimizing space and improving responsiveness. <br>
                    When the screen width decreases to 1024px, the footer layout shifts to a column format, ensuring all information remains visible and well-organized.</p>
            </section>
    
            <section class="enhancements-section">
                <h2>Enhancement 4: Local link</h2>
                <p>This HTML snippet creates a button-like link labeled "Explore Now" <a href="index.html">index.html</a> styled with the hero-btn class. It directs users to the #featured-jobs section, improving navigation and enhancing the call-to-action for job exploration.</p>
            </section>

            <section class="enhancements-section">
                <h2>Enhancement 5:Hover Effect for Featured Jobs</h2>
                <p>The transform: scale(1.1) combined with transition: transform 0.5s ease makes job listings more engaging. Additionally, the apply button changes color, further drawing user attention.</p>
            </section>

            <section class="enhancements-section">
                <h2>Enhancement 6: Responsive About Us Section</h2>
                <p>When the screen width shrinks to 768px, the layout adapts to a column format, and the content and image positions are reversed to maintain visual appeal.</p>
            </section>

            <section class="enhancements-section">
                <h2>Enhancement 7: Scrollable Timeline & Custom Scrollbar </h2>
                <p>This feature enables a scrollable timeline with a fixed height, ensuring seamless navigation through testimonials. The custom-styled scrollbar enhances aesthetics with a sleek, thin, and colored design.</p>
            </section>

            <section class="enhancements-section">
                <h2>Enhancement 8: Interactive Hover Effects</h2>
                <p>This feature introduces subtle movement when hovering over comments, enhancing engagement and creating a more dynamic user experience.</p>
            </section>
        </div>
    
    </main>
    <!-- Footer section -->
    <?php 
            include 'include\footer.inc'; 
    ?>
</body>
</html>
