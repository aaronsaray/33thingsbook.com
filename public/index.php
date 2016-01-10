<?php
    // this doesn't need to be that complex ;) - just make it fast

    // start getting all the items
    ob_start();

    $showReadingNavigation = false;

    $tableOfContents = [
        'Introduction'  =>  '/introduction',
        'Part 1: Programmers'   =>  '/part-1',
        'Chapter 1: Learn From Everything'   =>  '/chapter-1',
        'Chapter 2: Log Everything'   =>  '/chapter-2',
        'Chapter 3: Programmers are Customer Service'   =>  '/chapter-3',
        'Chapter 4: Real Talent is Making Things Simple'   =>  '/chapter-4',
        'Chapter 5: Have Pride in Your Work'   =>  '/chapter-5',
        'Chapter 6: Solve the Right Problem'   =>  '/chapter-6',
        'Chapter 7: Design for Your Users'   =>  '/chapter-7',
        'Chapter 8: When In Trouble, Break Up'   =>  '/chapter-8',
        'Chapter 9: Just Write More Code'   =>  '/chapter-9',
        'Chapter 10: Don’t Underestimate Analogies'   =>  '/chapter-10',
        'Chapter 11: Give Proper Visual Cues'   =>  '/chapter-11',
        'Chapter 12: Find Someone Smarter'   =>  '/chapter-12',
        'Chapter 13: Sometimes, Just Be Great'   =>  '/chapter-13',
        'Chapter 14: Catch Your Breath'   =>  '/chapter-14',
        'Chapter 15: Test Everything'   =>  '/chapter-15',
        'Chapter 16: Seek Out Feedback From Peers'   =>  '/chapter-16',
        'Chapter 17: Disagree In the Form of a Question'   =>  '/chapter-17',
        'Chapter 18: Guarantee Long-Term Quality Using Two Development Paths'   =>  '/chapter-18',
        'Chapter 19: Social Capital Is Just as Important As Skill'   =>  '/chapter-19',
        'Chapter 20: Step Up to Be A Senior Programmer'   =>  '/chapter-20',
        'Chapter 21: Write Out Your Goals'   =>  '/chapter-21',
        'Chapter 22: What to Look For In Code Review'   =>  '/chapter-22',
        'Chapter 23: Do Something Different'   =>  '/chapter-23',
        'Part 2: Managers'  =>  '/part-2',
        'Chapter 24: Make Face to Face Work'   =>  '/chapter-24',
        'Chapter 25: Learn to Do What They Do'   =>  '/chapter-25',
        'Chapter 26: If You are Seducing a Developer, Follow-Through Is Key'   =>  '/chapter-26',
        'Chapter 27: Motivation Isn’t Always About Money'   =>  '/chapter-27',
        'Chapter 28: Programmers Are Like Rockstars'   =>  '/chapter-28',
        'Chapter 29: Sometimes, Just Ask Why'   =>  '/chapter-29',
        'Chapter 30: Great Programmers Don’t Always Know It'   =>  '/chapter-30',
        'Chapter 31: Always Be Perfect'   =>  '/chapter-31',
        'Chapter 32: How to Deal With the Idiots Upstairs'   =>  '/chapter-32',
        'Chapter 33: Get QA Involved Sooner'   =>  '/chapter-33',
        'End Notes'   =>  '/end-notes',
        'Acknowledgements'   =>  '/acknowledgements'
    ];

    $paths = array_values($tableOfContents);

    $showReadingNavigation = $prevLink = $nextLink = $showSelectionSharer = false;
    if (($currentPage = array_search($_SERVER['REQUEST_URI'], $paths)) !== false) {
        $showReadingNavigation = $showSelectionSharer = true;
        $page = substr($_SERVER['REQUEST_URI'], 1) . '.html';

        if ($currentPage > 0) {
            $prevLink = current(array_slice($tableOfContents, $currentPage - 1, 1));
        }

        if ($currentPage < 37) { // the count of table of contents
            $nextLink = current(array_slice($tableOfContents, $currentPage + 1, 1));
        }
    }
    else {
        switch ($_SERVER['REQUEST_URI']) {
            case '/':
                $page = 'home.html';
                break;
            case '/toc':
                $page = 'toc.php';
                break;
            case '/about':
                $page = 'about.html';
                break;
            case '/donate':
                $page = 'donate.html';
                break;
            default:
                header("HTTP/1.0 404 Not Found");
                $page = '404.html';
        }
    }
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>33 Things I Wish Somebody Told Me | Book by Aaron Saray</title>
    <link rel="stylesheet" href="/main.min.1.css" />
    <link rel="author" href="http://aaronsaray.com">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <meta name="twitter:site" content="@aaronsaray">
    <meta name="twitter:creator" content="@aaronsaray">
    <meta property="og:title" content="33 Things I Wish Somebody Would Have Told Me">
    <meta property="og:description" content="After 2 decades of programming, Aaron Saray has compiled 33 Things that he wished he knew before he started programming.">
    <?php
    if ($prevLink !== false) {
        echo '<link rel="prev" href="' . $prevLink . '">';
    }
    if ($nextLink !== false) {
        echo '<link rel="next" href="' . $nextLink . '">';
    }
    ?>
</head>
<body>
<header>
    <nav><a href="/">Home</a> <a href="/introduction">Start Reading</a> <a href="/about">About</a> <a href="/donate" class="donate">Donate :)</a></nav>
    <h1>33 Things I Wish Somebody Would Have Told Me</h1>
    <p>A programmer's guide to quality code, great work relationships and respect.</p>
</header>
<main>
    <?php
    if ($showReadingNavigation) {
        echo '<nav class="nav">';
        if ($prevLink !== false) echo '<a href="' . $prevLink . '">&blacktriangleleft;Previous<span> Chapter</span></a>';
        echo '<a href="/toc">Table of Contents</a>';
        if ($nextLink !== false) echo '<a href="' . $nextLink . '">Next<span> Chapter</span> &blacktriangleright;</a>';
        echo '</nav>';
    }
    ?>
    <?php
    require __DIR__ . '/../src/' . $page;

    if ($showReadingNavigation && $nextLink) {
        echo '<nav class="keep-reading cta"><a href="' . $nextLink . '">Keep reading &blacktriangleright;</a></nav>';
    }
    ?>
</main>
<footer>
    <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">33 Things I Wish Somebody Would Have Told Me</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://aaronsaray.com" property="cc:attributionName" rel="cc:attributionURL">Aaron Saray</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.</p>
</footer>
<?php
if ($showSelectionSharer) {
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script src="/selection-sharer.min.js"></script><script>$("article p").selectionSharer();</script>';
}
?>
<script>if(window.location.hostname.search('33thingsbook.com')!==-1){(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r] || function(){(i[r].q=i[r].q || []).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create','UA-60057163-6','auto');ga('send','pageview');}</script>
</body>
</html>
<?php

$contents = ob_get_clean();

print preg_replace('/>\s+</', '><', $contents);